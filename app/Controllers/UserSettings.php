<?php

namespace App\Controllers;

use App\Models\LoginModel;

class UserSettings extends BaseController
{
    public $modal;
    public function __construct()
    {
        $this->modal = new LoginModel();
        return view('usersettings');
    }
    public function index()
    {
        return view('usersettings');
    }
}
