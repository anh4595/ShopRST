<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SlideRequest;
use App\slides;

class SlideController extends Controller
{
    public function Home()
    {
        return view('admin.extend.slide');
    }

    public function getSlide()
    {
        return view('admin.extend.addslide');
    }

    public function postSlide(SlideRequest $request)
    {
        $slide = new Slides();
        $slide->name = $request->nameslide;
        $slide->url = $request->image;
        if (isset($_POST['submit'])) 
        {
            if(isset($_POST['status']))
            {
                $slide->status = $_POST['status'];
            }  
        }
        $slide->save();
        return redirect()->route('admin.extend.slide');
    }
}
