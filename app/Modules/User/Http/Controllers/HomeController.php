<?php

namespace App\Modules\User\Http\Controllers;

class HomeController extends AppController
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('User::Home.index');
    }
}
