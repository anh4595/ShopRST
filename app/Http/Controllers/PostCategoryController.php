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
        $postCategory->metatitle = changeTitle($request->metatitle);
        $postCategory->parent_id = $request->category_id;
        $postCategory->description = $request->descriptions;
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
        $parent = PostCategories::select('id','name','parent_id')->get()->toArray();
        $postCategory = PostCategories::findOrFail($id)->toArray();
        return view('admin.post.editpostcategory',compact('parent','postCategory','id'));

    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["category" => "required"],
            ["category.required" => "Vui lòng nhập tên bài giới thiệu"]);

        $postCategory = PostCategories::find($id);
        $postCategory->name = $request->category;
        $postCategory->metatitle = changeTitle($request->metatitle);
        $postCategory->parent_id = $request->category_id;
        $postCategory->description = $request->descriptions;
        $postCategory->updatedby = $request->updateby;
        $postCategory->createdby = $request->createby;
        $postCategory->save();
        return redirect()->route('admin.post.postcategory');
    }  

    public function changeStatus($id)
	{
		$postCategory=PostCategories::find($id);
		if($postCategory->status != 1)
		        {
			$postCategory->status = 1;
			$postCategory->save();
		}
		else
		        {
			$postCategory->status = 0;
			$postCategory->save();
		}
		return redirect()->route('admin.post.postcategory');
	}
}
