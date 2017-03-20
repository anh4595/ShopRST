<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function Home()
    {
        return view('admin.role.role');
    }

    public function getRole()
    {
        return view('admin.role.addrole');
    }
}
