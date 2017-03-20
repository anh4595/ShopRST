<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FooterRequest;
use App\footers;

class FooterController extends Controller
{
    public function Home()
    {
        return view('admin.extend.footer');
    }

    public function getFooter()
    {
        return view('admin.extend.addfooter');
    }

    public function postFooter(FooterRequest $request)
    {
        $footer = new footers();   
        $footer->content = $request->detail;
        if (isset($_POST['submit'])) 
        {
            if(isset($_POST['status']))
            {
                $footer->status = $_POST['status'];
            }  
        }
        $footer->save();
        return redirect()->route('admin.extend.footer');
    }
}
