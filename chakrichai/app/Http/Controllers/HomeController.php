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
    }
    
    public function adminHome()
    {
        return view('dashboard.admin', ["msg"=>"Admin dashboard"]);
    }
    public function buyerHome()
    {
        return view('dashboard.buyer',["msg"=> "Buyer dashboard"]);
    }
    public function sellerHome()
    {
        return view('dashboard.seller', ["msg"=> "Seller dashboard"]);
    }
}
