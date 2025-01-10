<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\product;

use App\Models\User;

use App\Models\Card;
class HomeController extends Controller
{
    public function redirect()
    {
        $userType = Auth::user()->usertype;

        if($userType=='1')
        {
            return view('admin.home');
        }
        else
        {   
            $data = product::paginate(3);
            return view('user.home',compact('data'));
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = product::paginate(3);
            return view('user.home',compact('data'));
        }
        
    }

    public function search(Request $request)
    {
        $search = $request->search;
    
        if ($search == '') {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
    
        $data = product::where('title', 'Like', '%' . $search . '%')->get();
        return view('user.home', compact('data'));
    }
    
    public function addcard(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $product = Product::find($id);
    
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }
    
            $request->validate([
                'quantity' => 'required|integer|min:1',
            ]);
    
            $card = new Card;
            $card->name = $user->name; 
            $card->phone = $user->phone;
            $card->adress = $user->adress;
            $card->product_title = $product->title;
            $card->price = $product->price;
            $card->quantity = $request->quantity;
            $card->save();
    
            return redirect()->back()->with('message','Product Add Successfully');
        } else {
            return redirect('login');
        }
    }
    

}
