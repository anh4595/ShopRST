<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\posts;
use App\postcategories;

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
		$post->metatitle = changeTitle($request->metatitle);
		$post->metakeyword = $request->metakeyword;
		$post->image = $request->image;
		$post->detail = $request->detail;
		$post->description = $request->descriptions;
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
	
	public function changeStatus($id)
	{
		$post=Posts::find($id);
		if($post->status != 1)
		        {
			$post->status = 1;
			$post->save();
		}
		else
		        {
			$post->status = 0;
			$post->save();
		}
		return redirect()->route('admin.post.post');
	}
	
	public function truncate($text, $num)
	{
		if (strlen($text) <= $num)
		{
			return $text;
		}
		$text = substr($text, 0, 100);
		if ($text[$text-1] == ' ') 
		{
			return trim($text)."...";
		}
		$x  = explode(" ", $text);
		$sz = sizeof($x);
		if ($sz <= 1)   
		{
			return $text."...";
		}
		$x[$sz-1] = '';
		return trim(implode(" ", $x))."...";
	}

	public function getEdit($id)
    {
		$parent = PostCategories::select('id','name','parent_id')->get()->toArray();
        $post = Posts::findOrFail($id)->toArray();
        return view('admin.post.editpost',compact('parent','post','id'));
    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["namepost" => "required"],
            ["namepost.required" => "Vui lòng nhập tên bài viết"]);

        $post = Posts::find($id);
        $post->name = $request->namepost;
		$post->category_id = $request->cate_id;
		$post->metatitle = changeTitle($request->metatitle);
		$post->metakeyword = $request->metakeyword;
		$post->image = $request->image;
		$post->detail = $request->detail;
		$post->description = $request->descriptions;
		$post->createdby = $request->createby;
		$post->updatedby = $request->updateby;
        $post->save();
        return redirect()->route('admin.post.post');
    }
}
