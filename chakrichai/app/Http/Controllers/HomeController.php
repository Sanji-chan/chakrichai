<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    {   $user_id = Auth::user()->id;
        
        $posts= Post::where('user_id', Auth::id())->latest()->paginate(5);
        
        // return response()->json($posts);
        // return view('posts.index', compact('posts'));
        return view('dashboard.buyer',["msg"=> "Buyer dashboard"], compact('posts'));
    }
    public function sellerHome()
    {
        $user_id = Auth::user()->id;
        
        $posts= Post::where('user_id', Auth::id())->latest()->paginate(5);
        return view('dashboard.seller', ["msg"=> "Seller dashboard"], compact('posts'));
    }
}
