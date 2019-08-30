<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Session;
use App\Validators\BaseValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class AdminsController extends AppController
{
    /**
     * @var UserValidator
     */
    protected $userValidator;

    public function __construct(UserValidator $userValidator)
    {
        $this->userValidator = $userValidator;
    }

    public function dashboard()
    {
        return view('Admin::admins.dashboard');
    }

    /**
     * admin login get.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('Admin::admins.login');
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
            $this->userValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_USER_LOGIN);
        } catch (ValidatorException $e) {
            return redirect(route('admin.login'))->withErrors($e->getMessageBag())->withInput();
        }

        $data = $request->all();
        $auth = Auth()->guard('admin');
        $remember = isset($data['remember']) ? true : false;

        if ($auth->attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
            if (Auth()->guard('admin')->user()->group_id != 1) {
                $request->session()->flash('login-error', __('tài khoản của bạn không có quyền truy nhập vào trang này.'));
                Auth()->guard('admin')->logout();

                return redirect(route('admin.login'))->withInput();
            } elseif (Auth()->guard('admin')->user()->status != USER_STATUS_ACTIVE) {
                $request->session()->flash('login-error', __('tài khoản của bạn đã bị khóa.'));
                Auth()->guard('admin')->logout();

                return redirect(route('admin.login'))->withInput();
            }

            $url = self::_getRedirectUrl();

            return redirect()->to($url);
        } else {
            $request->session()->flash('login-error', __('sai địa chỉ email hoặc mật khẩu.'));

            return redirect(route('admin.login'))->withInput();
        }
    }

    public function logout()
    {
        Auth()->guard('admin')->logout();

        return redirect(route('admin.login'));
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
            $url = route('admin.dashboard');
        }

        return $url;
    }
}
