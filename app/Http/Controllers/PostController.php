<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\posts;

class PostController extends Controller
{
    public function Home()
    {
        return view('admin.post.post');
    }

    public function getPost()
    {
        return view('admin.post.addpost');
    }

    public function postPost(PostRequest $request)
    {
        $post = new Posts();
        $post->name = $request->namepost;
        $post->category_id = $request->category_id;
        $post->metatitle = $request->metatitle;
        $post->metakeyword = $request->metakeyword;
        $post->image = $request->image;   
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->createdby = $request->createby;
        $post->updatedby = $request->updateby;
        if (isset($_POST['tag'])){
            $post->tag = implode(',', $_POST['tag']);
        }
        if (isset($_POST['submit'])) 
        {
            if(isset($_POST['status']))
            {
                $post->status = $_POST['status'];
            }  
        }
        $post->save();
        return redirect()->route('admin.post.post');
    }

    public function getDelete($id)
    {
        $post = Posts::find($id);
        $post->delete($id);
        return redirect()->route('admin.post.post');
    }
}
