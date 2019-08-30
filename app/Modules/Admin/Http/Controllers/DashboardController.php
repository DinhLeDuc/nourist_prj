<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Controllers\AppController;

class DashboardController extends AppController
{

    public function index()
    {
        return view('Admin::Dashboard.index');
    }

}
