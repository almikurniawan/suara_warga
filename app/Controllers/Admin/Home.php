<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\SmartComponent\Grid;
use App\Libraries\SmartComponent\Form;

class Home extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }
}
