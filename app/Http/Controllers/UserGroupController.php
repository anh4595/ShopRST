<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function Home()
    {
        return view('admin.user.usergroup');
    }

    public function getUserGroup()
    {
        return view('admin.user.addusergroup');
    }
}
