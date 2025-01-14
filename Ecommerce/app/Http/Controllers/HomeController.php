<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\product;

use App\Models\User;

use App\Models\Order;

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
            $user=auth()->user();
            $count=Card::where('phone',$user->phone)->count();
            return view('user.home',compact('data','count'));
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

    public function showcart()
    {
        $user = auth()->user();
        $cart=card::where('phone',$user->phone)->get();
        $count=Card::where('phone',$user->phone)->count();
        return view('user.showcart', compact('count' ,'cart'));
    } 

    public function deletecart($id)
    {
        $cart = Card::find($id);
        $cart->delete();
        return redirect()->back()->with('message','Product Delete Successfully');
    }

    public function confirmorder(Request $request)
    {
        $user = auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->adress;

        foreach($request->productname as $key=>$productname)
        {
            $order = new order;
            $order->product_name=$request->productname[$key];
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];

            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;

            $order->status='pending';

            $order->save();

        }
         DB::table('cards')->where('phone',$phone)->delete();
          return redirect()->back()->with('message','Order Confirm Successfully');
    }
    

}
