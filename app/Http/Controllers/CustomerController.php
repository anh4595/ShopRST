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


    public function getDelete($id)
    {
        $customer = Customers::find($id);
        $customer->delete($id);
        return redirect()->route('admin.customer.customer');
    }

    public function changeStatus($id)
    {
        $customer=Customers::find($id);
        if($customer->status != 1)
        {
            $customer->status = 1;
            $customer->save();
        }
        else
        {
            $customer->status = 0;
            $customer->save();
        }
        return redirect()->route('admin.customer.customer');
    }
    

}
