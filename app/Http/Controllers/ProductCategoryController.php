<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\productcategories;

class ProductCategoryController extends Controller
{
        public function Home()
    {
        return view('admin.product.productcategory');
    }

    public function getProductCategory()
    {
        return view('admin.product.productcategory');
    }

    public function postProductCategory(CategoryRequest $request)
    {
        $postCategory = new ProductCategories();
        $postCategory->name = $request->category;
        $postCategory->metatitle = $request->metatitle;
        $postCategory->metakeyword = $request->metakeyword;
        $postCategory->parent_id = $request->parent_id;
        $postCategory->displayorder = $request->displayorder;
        $postCategory->description = $request->description;
        $postCategory->update_by = $request->updateby;
        $postCategory->create_by = $request->createby;
        if(isset($_POST['status']))
        {
            $postCategory->status = 1;
        }  
        else 
        {
            $postCategory->status = 0;
        }
        $postCategory->save();
        return redirect()->route('admin.product.productcategory');
    }
}
