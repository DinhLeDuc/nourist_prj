<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MemberController extends AppController
{

    public function __construct()
    {

    }


    public function showMyPage()
    {
        return view('User::Member.my_page');
    }


    public function showRegisterForm()
    {
        return view('User::Member.register');
    }


    public function register(Request $request)
    {

    }


    public function showLoginForm()
    {
        return view('User::Member.login');
    }


    public function login(Request $request)
    {

    }


    public function logout()
    {

    }


    public function verify(Request $request)
    {

    }

}
