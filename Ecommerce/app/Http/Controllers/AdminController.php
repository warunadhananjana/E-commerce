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

        $data->quantity=$requset->quantity;

        $data->save();

        return redirect()->back()->with('message','Product Add Successfully');

    }
    public function showproduct()
    {
        $data=Product::all();
        return view('admin.showproduct',compact('data'));
    }
    public function deleteproduct($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function updateview($id) {

        $data = Product::find($id);
        return view('admin.updateview',compact('data'));
    }

    public function updateproduct($id ,request $requset) {

        $data = Product::find($id);
        $image=$requset->file;

         if($image)
         {
        $imagename=time().'.'.$image->getClientoriginalExtension();

        $requset->file->move('productimage',$imagename);

        $data->image=$imagename;

         }

        $data->title=$requset->title;

        $data->price=$requset->price;

        $data->description=$requset->des;

        $data->quantity=$requset->quantity;

        $data->save();

        return redirect()->back()->with('message','Product Uploaded Successfully');
        
    }
    
    

}
