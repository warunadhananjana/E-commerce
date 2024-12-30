<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AdminController extends Controller // Corrected here
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(request $requset)
    {
        $data=new Product;

        $image=$requset->file;

        $imagename=time().'.'.$image->getClientoriginalExtension();

        $requset->file->move('productimage',$imagename);

        $data->image=$imagename;

        $data->title=$requset->title;

        $data->price=$requset->price;

        $data->description=$requset->des;

        $data->quantity=$requset->Quantity;

        $data->save();

        return redirect()->back()->with('message','Product Uploaded Successfully');

    }
    public function showproduct()
    {
        $data=Product::all();
        return view('admin.showproduct',compact('data'));
    }
}
