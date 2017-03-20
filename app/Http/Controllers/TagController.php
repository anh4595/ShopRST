<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\tags;

class TagController extends Controller
{
    public function Home()
    {
        return view('admin.tag.tag');
    }

    public function getTag()
    {
        return view('admin.tag.tag');
    }

    public function postTag(TagRequest $request)
    {
        $tag = new Tags();
        $tag->id = $request->namecode;
        $tag->name = $request->nametag;
        if (isset($_POST['submit'])) 
        {
            if(isset($_POST['type']))
            {
                $tag->type = $_POST['type'];
            }  
        }
        $tag->save();
        return redirect()->route('admin.tag.tag');
    }

    public function getDelete($id)
    {
        $tag = Tags::find($id);
        $tag->delete($id);
        return redirect()->route('admin.tag.tag');
    }

    public function getEdit($id)
    {
        $tag = Tags::findOrFail($id)->toArray();
        return view('admin.tag.edittag',compact('tag','id'));

    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["nametag" => "required"],
            ["nametag.required" => "Vui lòng nhập mã code thẻ tag"]);

        $tag = Tags::find($id);
        $tag->name = $request->nametag;
        $tag->save();
        return redirect()->route('admin.tag.tag');
    }
}
