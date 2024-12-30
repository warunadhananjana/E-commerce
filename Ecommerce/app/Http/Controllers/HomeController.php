<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\product;

use App\Models\User;

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
}
