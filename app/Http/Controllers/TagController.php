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
}
