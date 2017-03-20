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
        $tag_product="";
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
        $product->description = $request->description;
        $product->detail = $request->detail;
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
}
