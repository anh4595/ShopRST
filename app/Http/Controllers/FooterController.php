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

    public function getDelete($id)
    {
        $footer = Footers::find($id);
        $footer->delete($id);
        return redirect()->route('admin.extend.footer');
    }

    public function getEdit($id)
    {
        $footer = Footers::findOrFail($id)->toArray();
        return view('admin.extend.editfooter',compact('footer','id'));

    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["detail" => "required"],
            ["detail.required" => "Vui lòng nhập nội dung chân trang"]);

        $footer = Footers::find($id);
        $footer->content = $request->detail;
        $footer->save();
        return redirect()->route('admin.extend.footer');
    }

    public function changeStatus($id)
    {
        $footer=Footers::find($id);
        if($footer->status != 1)
        {
            $footer->status = 1;
            $footer->save();
        }
        else
        {
            $footer->status = 0;
            $footer->save();
        }
        return redirect()->route('admin.extend.footer');
    }
}
