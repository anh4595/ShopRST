<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\contacts;


class ContactController extends Controller
{
    public function Home()
    {
        return view('admin.extend.contact');
    }

    public function getContact()
    {
        return view('admin.extend.addcontact');
    }

    public function postContact(ContactRequest $request)
    {
        $contact = new Contacts();
        $contact->name = $request->namecompany;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->website = $request->website;
        $contact->address = $request->address;
        $contact->lat = $request->lat;
        $contact->lng = $request->lng;
        if (isset($_POST['submit'])) 
        {
            if(isset($_POST['status']))
            {
                $contact->status = $_POST['status'];
            }  
        }
        $contact->save();
        return redirect()->route('admin.extend.contact');
    }
}
