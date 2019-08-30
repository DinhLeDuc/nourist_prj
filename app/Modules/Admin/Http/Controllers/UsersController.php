<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Models\City;
use App\Models\Host;
use App\Models\User;
use App\Models\Group;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Validators\UserValidator;
use App\Validators\BaseValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class UsersController extends AppController
{
    /**
     * @var UserValidator
     */
    protected $userValidator;

    public function __construct(UserValidator $userValidator)
    {
        $this->userValidator = $userValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchInput = $request->all();
        $groups = Group::pluck('name', 'id');

        $query = User::orderBy('id', 'desc');
        if ($request->has('keyword')) {
            $query->where(function ($q) use ($searchInput) {
                $q->where('fullname', 'like', '%'.$searchInput['keyword'].'%')
                ->orWhere('username', 'like', '%'.$searchInput['keyword'].'%')
                ->orWhere('email', 'like', '%'.$searchInput['keyword'].'%')
                ->orWhere('phone_number', 'like', '%'.$searchInput['keyword'].'%');
            });
        }
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', '=', $request->status);
        }
        if ($request->has('group_id') && $request->group_id != 'all') {
            $query->where('group_id', '=', $request->group_id);
        }

        $users = $query->paginate(PAGE_NUMBER);

        return view('Admin::users.index', compact('users', 'groups', 'searchInput'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::pluck('name', 'id');
        $citys = City::orderBy('name', 'asc')->pluck('name', 'code');

        return view('Admin::users.create', compact('groups', 'citys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->userValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_CREATE);
        } catch (ValidatorException $e) {
            return redirect(route('admin.users.create'))->withErrors($e->getMessageBag())->withInput();
        }

        $dataForm = $request->all();
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $uploadPath = public_path('images/users');
            $file->move($uploadPath, $fileName);
            $dataForm['avatar'] = '/images/users/'.$fileName;
        }

        //Check if user was created
        if ($user = User::create($dataForm)) {
            $dataForm['user_id'] = $user->id;
            if ($dataForm['group_id'] == 2) {
                Host::create($dataForm);
            } elseif ($dataForm['group_id'] == 3) {
                Guest::create($dataForm);
            }

            return redirect()->route('admin.users.index')->with('success', __('thêm khách hàng thành công.'));
        } else {
            return redirect(route('admin.users.create'))->with('error', __('Không thể lưu được vui lòng kiểm tra lại thông tin nhập vào.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Admin::users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $groups = Group::pluck('name', 'id');
        $citys = City::orderBy('name', 'asc')->pluck('name', 'code');

        if (empty($user->guest)) {
            $user->guest = new Guest();
        }

        if (empty($user->host)) {
            $user->host = new Host();
        }

        return view('Admin::users.edit', compact('user', 'groups', 'citys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $this->userValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_UPDATE);
        } catch (ValidatorException $e) {
            return redirect(route('admin.users.edit'))->withErrors($e->getMessageBag())->withInput();
        }

        $dataForm = $request->all();
        if (empty($dataForm['password'])) {
            unset($dataForm['password']);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $uploadPath = public_path('images/users');
            $file->move($uploadPath, $fileName);
            $dataForm['avatar'] = '/images/users/'.$fileName;
        }

        //Check if user was created
        if ($user->update($dataForm)) {
            if ($dataForm['group_id'] == 2) {
                $user->host->update($dataForm);
            } elseif ($dataForm['group_id'] == 3) {
                $user->guest->update($dataForm);
            }

            return redirect()->route('admin.users.index')->with('success', __('Cập nhật thành công.'));
        } else {
            return redirect(route('admin.users.edit'))->with('error', __('Không thể lưu được vui lòng kiểm tra lại thông tin nhập vào.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $User
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user->delete();
        $user->update(['status' => USER_STATUS_DISABLE]);

        return redirect()->route('admin.users.index')->with('success', __('xóa thành công.'));
    }
}
