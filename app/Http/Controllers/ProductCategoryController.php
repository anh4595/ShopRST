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
        $productCategory->metatitle = changeTitle($request->metatitle);
        $productCategory->metakeyword = $request->metakeyword;
        $productCategory->parent_id = $request->category_id;
        $productCategory->displayorder = $request->displayorder;
        $productCategory->description = $request->descriptions;
        $productCategory->image = $request->image;
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

    public function changeStatus($id)
    {
        $productCategory=ProductCategories::find($id);
        if($productCategory->status != 1)
        {
            $productCategory->status = 1;
            $productCategory->save();
        }
        else
        {
            $productCategory->status = 0;
            $productCategory->save();
        }
        return redirect()->route('admin.product.productcategory');
    }

    public function multiDelete()
    {
        foreach($_POST['checkboxDel'] as $deleteID)
        {
            $productCategory = ProductCategories::find($deleteID);
            $productCategory->delete($id);
        }
        return redirect()->route('admin.product.productcategory');
    }

    public function getEdit($id)
    {
        $productCategory = ProductCategories::findOrFail($id)->toArray();
        $parent = ProductCategories::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.editproductcategory',compact('parent','productCategory','id'));
    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["category" => "required"],
            ["category.required" => "Vui lòng nhập tên danh mục"]);

        $productCategory = ProductCategories::find($id);
        $productCategory->name = $request->category;
        $productCategory->metatitle = changeTitle($request->metatitle);
        $productCategory->metakeyword = $request->metakeyword;
        $productCategory->parent_id = $request->category_id;
        $productCategory->displayorder = $request->displayorder;
        $productCategory->description = $request->descriptions;
        $productCategory->image = $request->image;
        $productCategory->update_by = $request->updateby;
        $productCategory->create_by = $request->createby;
        $productCategory->save();
        return redirect()->route('admin.product.productcategory');
    }
}
