<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function Home()
    {
        return view('admin.role.permission');
    }

    public function getPermission()
    {
        return view('admin.role.addpermission');
    }
}
