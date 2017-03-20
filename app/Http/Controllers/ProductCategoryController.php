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
        $productCategory = new ProductCategories();
        $productCategory->name = $request->category;
        $productCategory->metatitle = $request->metatitle;
        $productCategory->metakeyword = $request->metakeyword;
        $productCategory->parent_id = $request->parent_id;
        $productCategory->displayorder = $request->displayorder;
        $productCategory->description = $request->description;
        $productCategory->update_by = $request->updateby;
        $productCategory->create_by = $request->createby;
        if(isset($_POST['status']))
        {
            $productCategory->status = 1;
        }  
        else 
        {
            $productCategory->status = 0;
        }
        $productCategory->save();
        return redirect()->route('admin.product.productcategory');
    }

    public function getDelete($id)
    {
        $productCategory = ProductCategories::find($id);
        $productCategory->delete($id);
        return redirect()->route('admin.product.productcategory');
    }
}
