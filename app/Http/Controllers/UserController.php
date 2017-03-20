<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Home()
    {
        return view('admin.user.user');
    }

    public function getUser()
    {
        return view('admin.user.adduser');
    }
}
