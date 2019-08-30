<?php

namespace App\Modules\User\Http\Controllers;

class HostsController extends AppController
{
    public function detail()
    {
        return view('User::hosts.detail');
    }
}
