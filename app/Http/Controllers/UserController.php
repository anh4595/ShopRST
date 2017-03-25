<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserRequest;

use App\user;

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

	public function getLoginAdmin()
	{
		if(!Auth::check())
		{
			return view('admin.login.login');
		}
		else
		{
			return view('admin.index');
		}
	}

	public function postLoginAdmin(UserRequest $request)
    {
		$login = [
			'username' => $request->username,
			'password' => $request->password,
		];

    	if(Auth::attempt($login))
		{
    		return redirect()->route('admin.index');
    	}
		else
		{
    		return redirect()->back();
    	}
    }

	public function postLogoutAdmin()
	{
		Auth::logout();
		return redirect('admin/login');
	}
}
