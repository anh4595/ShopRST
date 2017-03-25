<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use DB, Cart;
use App\feedbacks;
use App\Http\Requests\FeedbackRequest;

class HomeController extends Controller
{
    public function listPost()
    {
        return view('client.post.blog');
    }

    public function detailPost($id)
    {
        $post=DB::table('posts')->where('id',$id)->first();
        return view('client.post.blog-detail',compact('post'));
    }

    public function detailProduct($id)
    {
        $product = DB::table('products')->where('id',$id)->first();
        return view('client.detail.detail',compact('product'));
    }
    
    public function listProductCategory($id)
    {
        $product_category=DB::table('products')->where('status',1)->where('category_id',$id)->paginate(9);
        $name_category=DB::table('productcategories')->where('id',$id)->get();
        return view('client.product.category',compact('product_category','name_category'));
    }

    public function listProductSale()
    {
        $product_sale = DB::table('products')->where('promotionflag',1)->where('status',1)->paginate(9);
        return view('client.product.productsale',compact('product_sale'));
    }

    public function contactCompany()
    {
        $contact = DB::table('contacts')->where('status',1)->get();
        return view('client.other.contact',compact('contact'));
    }

    public function aboutCompany()
    {
        $about = DB::table('abouts')->where('status',1)->get();
        return view('client.other.about',compact('about'));
    }

    public function getFeedback()
    {
        return view('client.other.contact');
    }

    public function postFeedback(FeedbackRequest $request)
    {
        $feedback = new Feedbacks();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->save();
        return redirect()->route('contactCompany');
    }

    public function cartProduct($id)
    {
        $product_by=DB::table('products')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_by->name,'qty'=>1,'price'=>$product_by->price,'options'=>array('img'=>$product_by->image)));
        $content=Cart::content();
        return redirect()->route('checkoutProduct');
    }

    public function checkoutProduct()
    {
        $content = Cart::content();
        $count_product = Cart::count();
        $total = Cart::subtotal();
        return view('client.cart.order',compact('content','count_product','total'));
    }

    public function deleteProduct($id)
    {
        Cart::remove($id);
        return redirect()->route('checkoutProduct');
    }
    
    public function updateCart( )
    {
        if(Request::ajax())
        {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id,$qty);
                echo "oke";
        }   
    }

}
