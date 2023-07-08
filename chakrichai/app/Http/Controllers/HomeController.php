<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
        // if (auth()->user()->role == 'admin') 
        // {
        //   return redirect()->route('admin.home');
        // }
        // else if (auth()->user()->role == 'buyer') 
        // {
        //   return redirect()->route('buyer.home');
        // }
        // else
        // {
        //   return redirect()->route('seller.home');
        // }
        
    }
    
    public function adminHome()
    {
        return view('dashboard', ["msg"=>"Admin dashboard"]);
    }
    public function buyerHome()
    {
        return view('dashboard',["msg"=> "Buyer dashboard"]);
    }
    public function sellerHome()
    {
        return view('dashboard', ["msg"=> "Seller dashboard"]);
    }
}
