<?php

namespace App\Modules\User\Http\Controllers;

use App\Models\City;
use App\Models\Host;
use App\Models\User;
use App\Models\Group;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\File;
use App\Validators\BaseValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Mail\ForgotPassword;
use Mail;
use Illuminate\Support\Facades\Hash;

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
     * admin login get.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth()->user()) {
            return redirect(route('homes.index'));
        }

        return view('User::users.login');
    }

    /**
     * admin login submit.
     *
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        try {
            $this->userValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_USER_LOGIN);
        } catch (ValidatorException $e) {
            return redirect(route('login'))->withErrors($e->getMessageBag())->withInput();
        }

        $data = $request->all();
        $remember = isset($data['remember']) ? true : false;

        if (Auth()->attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
            if (Auth()->user()->status == USER_STATUS_VERIFY) {
                $request->session()->flash('login-error', __('Tài khoản của chưa được xác thực, vui lòng kiểm tra email để xác thực tài khoản.'));
                Auth()->logout();

                return redirect(route('login'))->withInput();
            } elseif (Auth()->user()->status == USER_STATUS_DISABLE) {
                $request->session()->flash('login-error', __('Tài khoản của bạn đã bị khóa, liên hệ Quản trị viên để lấy lại tài khoản.'));
                Auth()->logout();

                return redirect(route('login'))->withInput();
            }

            return redirect(route('homes.index'));
        } else {
            $request->session()->flash('login-error', __('Sai địa chỉ email hoặc mật khẩu.'));

            return redirect(route('login'))->withInput();
        }
    }

    public function logout()
    {
        Auth()->logout();

        return redirect(route('homes.index'));
    }

    public function showRegisterForm()
    {
        $groups = Group::where('name', '!=', 'Admin')->pluck('name', 'id');
        $citys = City::orderBy('name', 'asc')->pluck('name', 'code');

        return view('User::users.register', compact('groups', 'citys'));
    }

    /**
     * register a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $this->userValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_CREATE);
        } catch (ValidatorException $e) {
            return redirect(route('register'))->withErrors($e->getMessageBag())->withInput();
        }

        $dataForm = $request->all();
        $foodUserFolder = public_path('images/users');
        if (!File::exists($foodUserFolder)) {
            $org_img = File::makeDirectory($foodUserFolder, 0777, true);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($foodUserFolder, $fileName);
            $dataForm['avatar'] = '/images/users/'.$fileName;
        }
        $dataForm['status'] = USER_STATUS_ACTIVE;

        //Check if user was created
        if ($user = User::create($dataForm)) {
            $dataForm['user_id'] = $user->id;
            if ($dataForm['group_id'] == 2) {
                Host::create($dataForm);
            } elseif ($dataForm['group_id'] == 3) {
                Guest::create($dataForm);
            }

            if (Auth()->attempt(['email' => $dataForm['email'], 'password' => $dataForm['password'], 'status' => USER_STATUS_ACTIVE])) {
                return redirect(route('homes.index'));
            }

            // return redirect(route('login'))->with('status', 'Vui lòng xác nhận tài khoản email');
        } else {
            return redirect(route('register'))->with('error', __('Đăng ký thất bại vui lòng kiểm tra lại thông tin nhập vào.'));
        }
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code);

        if ($user->count() > 0) {
            $user->update([
                'confirmed' => 1,
                'confirmation_code' => null,
            ]);
            $notification_status = __('Bạn đã xác nhận thành công');
        } else {
            $notification_status = __('Mã xác nhận không chính xác');
        }

        return redirect(route('login'))->with('status', $notification_status);
    }

    public function showForgotPasswordForm()
    {
        return view('User::users.forgot');       

    }
    
    public function forgotPassword(Request $request)
    {  
        $dataform = $request->all();
        $dataForm['status'] = USER_STATUS_ACTIVE;
           $user = User::Where(['email' => $dataform['email'],'status'=> USER_STATUS_ACTIVE])->first();
            if(!$user){
            return redirect()->back()->with('forgot-error', __('Bạn chưa nhập Email hoặc tài khoản này chưa được xác thực hoặc đã bị khóa'));
            }
            $token = md5('aAJkad' . time());
            $user->token = $token;
            $user->save();
            if ($user->save()) {
                Mail::to($user->email)->send(new ForgotPassword($user->token));
                return redirect()->back()->with('success',__('Gửi mail thành công vui lòng vào Email của bạn để xác nhận'));
            }


    //    try{ 
    //        die('gggs');
    //        $this->userValidator->with($request->all())->passesOrFail(BaseValidatorInterface::RULE_USER_LOGIN);
    //        $dataform = $request->all();
    //        $dataForm['status'] = 'active';
    //           $user = User::Where(['email' => $dataform['email'],'status'=> 'active'])->first();
    //           dd($user->email);
    //            if(!$user){
    //            return redirect()->back()->with('forgot-error', __('Tài khoản này chưa được xác thực hoặc đã bị khóa'));
    //            }
    //     //    $token = md5('aAJkad' . time());
    //     //    $verify = $user->update(['token'=>$token]);
    //        if ($user) {
    //            Mail::to($user->email)
    //                ->queue(new ForgotPassword($dataform));
    //             return redirect()->back()->with('success',__('Gửi mail thành công vui lòng vào Email của bạn để xác nhận'));
    //        }
    //     //    return view('User::users.forgot.success', compact('user'));
    //    } catch (ValidatorException $e) {
    //        return view('User::users.forgot', compact('user'))->withErrors($e->getMessageBag());
    //    }    
    }

    public function showFormResetPassword($token)
    {
        $user = User::Where(['token'=>$token])->first();
        return view('User::users.reset-password',compact('user'));
    }

    public function resetPassword(Request $request, $token)
    {
        
        $user = User::Where(['token'=>$token])->first();
        if($user && $request->password && $request->confirmpassword && $request->password==$request->confirmpassword  ){
        $user->password = $request->password;
        $user->save();
        return redirect()->back()->with('success',__('Thay đổi mật khẩu thành công'));
        }else{
        return redirect()->back()->with( 'error', __('Vui lòng kiểm tra lại giá trị của Mật khẩu và Xác nhận mật khẩu'));
        }

    }

}
