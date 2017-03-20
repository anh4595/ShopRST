<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\customers;

class CustomerController extends Controller
{
    public function Home()
    {
        return view('admin.customer.customer');
    }

    public function HomeFeedback()
    {
        return view('admin.customer.feedback');
    }

    public function getDelete($id)
    {
        $customer = Customers::find($id);
        $customer->delete($id);
        return redirect()->route('admin.customer.customer');
    }
    

}
