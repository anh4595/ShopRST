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

    public function getDelete($id)
    {
        $slide = Slides::find($id);
        $slide->delete($id);
        return redirect()->route('admin.extend.slide');
    }

    public function getEdit($id)
    {
        $slide = Slides::findOrFail($id)->toArray();
        return view('admin.extend.editslide',compact('slide','id'));

    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["nameslide" => "required"],
            ["nameslide.required" => "Vui lòng nhập tên slide ảnh"]);

        $slide = Slides::find($id);
        $slide->name = $request->nameslide;
        $slide->url = $request->image;
        $slide->save();
        return redirect()->route('admin.extend.slide');
    }
}
