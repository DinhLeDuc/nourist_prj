<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Models\Manager;
use App\Repositories\ManagerRepository;
use App\Validators\ManagerValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Validators\BaseValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Hash;

class ManagerController extends AppController
{
    protected $managerRepository;
    protected $managerValidator;

    public function __construct(
        ManagerRepository $managerRepository,
        ManagerValidator $managerValidator
    ) {
        $this->managerRepository = $managerRepository;
        $this->managerValidator = $managerValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = [];

        if ($request->has('email')) {
            $search[] = ['email', 'like', "%{$request->query('email')}%"];
        }

        if ($request->has('name')) {
            $search[] = ['first_name', 'like', "%{$request->query('name')}%"];
            $search[] = ['last_name', 'like', "%{$request->query('name')}%"];
        }

        if ($request->has('rule')) {
            $search[] = ['rule', $request->query('rule')];
        }

        $list = $this->managerRepository->scopeQuery(function ($query) use ($search) {
            return $query
                ->where($search)
                ->sortable('id', 'desc');
        });

        $search['limit'] = $request->query('limit') ? $request->query('limit') : ADMIN_DEFAULT_LIMIT;
        $managers = $list->paginate($search['limit']);

        return view('Admin::Manager.index', compact('managers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $manager = new Manager();

        return view('Admin::Manager.create', compact('manager'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $this->managerValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_CREATE);

            $data = array_merge($request->all(), ['password' => Hash::make($request->get('confirm_password'))]);

            if (Auth::guard('admin')->user()->rule == ROLE_MASTER_ADMIN) {
                $data['rule'] = RULE_STORE_ADMIN;
            }

            $this->managerRepository->create($data);

            $request->session()->flash('alert-success', __('add new manager success'));

            return redirect(route('admin.managers.index'));
        } catch (ValidatorException $e) {
            $request->session()->flash('alert-warning', __('add new manager failed'));

            return redirect(route('admin.managers.create'))->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        $manager = $this->managerRepository->findWhere(['id' => $id])->first();

        if (empty($manager)) {
            \request()->session()->flash('alert-warning', __('Manager not found'));

            return redirect(route('admin.managers.index'));
        }

        return view('Admin::Manager.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $manager = $this->managerRepository->findWhere(['id' => $id])->first();

        if (empty($manager)) {
            \request()->session()->flash('alert-warning', __('Manager not found'));

            return redirect(route('admin.managers.index'));
        }

        return view('Admin::Manager.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $manager = $this->managerRepository->findWhere(['id' => $id])->first();

        if (empty($manager)) {
            \request()->session()->flash('alert-warning', __('Manager not found'));

            return redirect(route('admin.managers.index'));
        }

        try {
            $this->managerValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_UPDATE);

            $data = $request->all();

            $this->managerRepository->update($data, $id);

            $request->session()->flash('alert-success', __('update manager success'));

            return redirect(route('admin.managers.index'));
        } catch (ValidatorException $e) {
            $request->session()->flash('alert-warning', __('update manager failed'));

            return redirect(route('admin.managers.edit', $id))->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $manager = $this->managerRepository->findWhere(['id' => $id])->first();

        if (empty($manager)) {
            \request()->session()->flash('alert-warning', __('Manager not found'));

            return redirect(route('admin.managers.index'));
        }

        if ($this->managerRepository->delete($id)) {
            \request()->session()->flash('alert-success', __('delete manager success'));
        } else {
            \request()->session()->flash('alert-warning', __('delete manager failed'));
        }

        return redirect(route('admin.managers.index', $id));
    }

    /**
     * admin login get.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        $manager = new Manager();

        return view('Admin::Manager.login', compact('manager'));
    }

    /**
     * admin login submit.
     *
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signIn(Request $request)
    {
        try {
            $data = $request->all();

            $this->managerValidator->with($data)->passesOrFail(BaseValidatorInterface::RULE_MANAGER_LOGIN);

            $auth = Auth()->guard('admin');
            $remember = isset($data['remember']) ? true : false;

            if ($auth->attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
                $url = self::_getRedirectUrl();

                return redirect()->to($url);
            } else {
                $request->session()->flash('alert-warning', __('invalid email address or password'));

                return redirect(route('admin.managers.login'))->withInput();
            }
        } catch (ValidatorException $e) {
            return redirect(route('admin.managers.login'))->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * logout admin.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth()->guard('admin')->logout();

        return redirect(route('admin.managers.login'));
    }

    /**
     * @return string
     */
    private function _getRedirectUrl()
    {
        if (Session::has('admin_redirect_url')) {
            $url = Session::get('admin_redirect_url');
            Session::forget('admin_redirect_url');
        } else {
            $url = route('admin.dashboards.index');
        }

        return $url;
    }
}
