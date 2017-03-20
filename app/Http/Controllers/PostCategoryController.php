<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\postcategories;

class PostCategoryController extends Controller
{
    public function Home()
    {
        return view('admin.post.postcategory');
    }

    public function getPostCategory()
    {
        return view('admin.post.postcategory');
    }

    public function postPostCategory(CategoryRequest $request)
    {
        $postCategory = new PostCategories();
        $postCategory->name = $request->category;
        $postCategory->metatitle = $request->metatitle;
        $postCategory->description = $request->description;
        $postCategory->updatedby = $request->updateby;
        $postCategory->createdby = $request->createby;
        if(isset($_POST['status']))
        {
            $postCategory->status = 1;
        }  
        else 
        {
            $postCategory->status = 0;
        }
        $postCategory->save();
        return redirect()->route('admin.post.postcategory');
    }

    public function getDelete($id)
    {
        $postCategory = PostCategories::find($id);
        $postCategory->delete($id);
        return redirect()->route('admin.post.postcategory');
    }  

    public function getEdit($id)
    {
        $postCategory = PostCategories::findOrFail($id)->toArray();
        return view('admin.extend.editfooter',compact('postCategory','id'));

    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["name" => "required"],
            ["namecontact.required" => "Vui lòng nhập tên bài giới thiệu"]);

        $postCategory = PostCategories::find($id);
        $postCategory->content = $request->detail;
        $postCategory->save();
        return redirect()->route('admin.extend.footer');
    }  
}
