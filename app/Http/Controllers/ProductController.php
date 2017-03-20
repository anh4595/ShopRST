<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\products;

class ProductController extends Controller
{
    public function Home()
    {
        return view('admin.product.product');
    }

    public function getProduct()
    {
        return view('admin.product.addproduct');
    }

    public function postProduct(ProductRequest $request)
    {
        $product = new Products();
        $product->name = $request->nameproduct;
        $product->category_id = $request->category_id;
        $product->metatitle = $request->metatitle;
        $product->metakeyword = $request->metakeyword;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->promotionprice = $request->promotionprice;
        $product->image = $request->image;   
        if (isset($_POST['tag'])){
            $product->tag = implode(',', $_POST['tag']);
        }
        if (isset($_POST['tag'])){
            $product->size = implode(',', $_POST['size']);
        }
        $more_image1 = $request->imagedetail1;
        $more_image2 = $request->imagedetail2;
        $more_image3 = $request->imagedetail3;
        $more_image4 = $request->imagedetail4;
        $more_image = $more_image1.";".$more_image2.";".$more_image3.";".$more_image4;
        $product->moreimage = $more_image;

        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->create_by = $request->createby;
        $product->update_by = $request->updateby;
        if(isset($_POST['hotflag']))
        {
            $product->hotflag = 1;
        }  
        else 
        {
            $product->hotflag = 0;
        }

        if(isset($_POST['homeflag']))
        {
            $product->homeflag = 1;
        }  
        else 
        {
            $product->homeflag = 0;
        }

        if(isset($_POST['promotionflag']))
        {
            $product->promotionflag = 1;
        }  
        else 
        {
            $product->promotionflag = 0;
        }

        if (isset($_POST['submit'])) 
        {
            if(isset($_POST['status']))
            {
                $product->status = $_POST['status'];
            }  
        }
        $product->save();
        return redirect()->route('admin.product.product');
    }

    public function getDelete($id)
    {
        $product = Products::find($id);
        $product->delete($id);
        return redirect()->route('admin.product.product');
    }

    public function getEdit($id)
    {
        $product = Products::findOrFail($id)->toArray();
        return view('admin.product.editproduct',compact('product','id'));

    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["nameproduct" => "required"],
            ["nameproduct.required" => "Vui lòng nhập tên sản phẩm"]);

        $product = Products::find($id);
        $product->name = $request->nameproduct;
        $product->category_id = $request->category_id;
        $product->metatitle = $request->metatitle;
        $product->metakeyword = $request->metakeyword;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->promotionprice = $request->promotionprice;
        $product->image = $request->image;   
        if (isset($_POST['tag'])){
            $product->tag = implode(',', $_POST['tag']);
        }
        if (isset($_POST['tag'])){
            $product->size = implode(',', $_POST['size']);
        }
        $more_image1 = $request->imagedetail1;
        $more_image2 = $request->imagedetail2;
        $more_image3 = $request->imagedetail3;
        $more_image4 = $request->imagedetail4;
        $more_image = $more_image1.";".$more_image2.";".$more_image3.";".$more_image4;
        $product->moreimage = $more_image;
        $product->detail = $request->detail;
        $product->description = $request->description;
        $product->create_by = $request->createby;
        $product->update_by = $request->updateby;
        $product->save();
        return redirect()->route('admin.product.product');
    }
}
