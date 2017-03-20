<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\abouts;

class AboutController extends Controller
{
    public function Home()
    {
        return view('admin.extend.about');
    }

    public function getAbout()
    {
        return view('admin.extend.addabout');
    }
    public function postAbout(AboutRequest $request)
    {
        $about = new Abouts();
        $about->name = $request->nameabout;
        $about->detail = $request->detail;
        $about->updatedby = $request->updateby;
        $about->createdby = $request->createby;
        if (isset($_POST['submit'])) 
        {
            if(isset($_POST['status']))
            {
                $about->status = $_POST['status'];
            }  
        }
        $about->save();
        return redirect()->route('admin.extend.about');
    }
}
