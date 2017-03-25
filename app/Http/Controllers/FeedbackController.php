<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feedbacks;

class FeedbackController extends Controller
{
    public function HomeFeedback()
    {
        return view('admin.customer.feedback');
    }

    public function getDelete($id)
    {
        $feedback = Feedbacks::find($id);
        $feedback->delete($id);
        return redirect()->route('admin.customer.feedback');
    }



}
