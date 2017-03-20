<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\sizes;

class SizeController extends Controller
{
    public function Home()
    {
        return view('admin.product.size');
    }

    public function getSize()
    {
        return view('admin.product.size');
    }

    public function postSize(SizeRequest $request)
    {
        $size = new Sizes();
        $size->id = $request->namecode;
        $size->name = $request->namesize;
        $size->save();
        return redirect()->route('admin.product.size');
    }

    public function getDelete($id)
    {
        $size = Sizes::find($id);
        $size->delete($id);
        return redirect()->route('admin.product.size');
    }

    public function getEdit($id)
    {
        $size = Sizes::findOrFail($id)->toArray();
        return view('admin.product.editsize',compact('size','id'));

    }

    public function postEdit(Request $request,$id)
    {
        $this->validate($request,
            ["namesize" => "required"],
            ["namesize.required" => "Vui lòng nhập mã code thẻ tag"]);

        $size = Sizes::find($id);
        $size->name = $request->namesize;
        $size->save();
        return redirect()->route('admin.product.size');
    }
}
