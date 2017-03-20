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
}
