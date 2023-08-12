<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Complain;
use App\Models\Application;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;

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

    // protected $redirectTo = RouteServiceProvider::HOME;
    
    public function index(){     
        return view('home');
    }
    
    public function adminHome()
    {
        $complains = Complain::sortable()->simplePaginate(5);

        return view('dashboard.admin', ["msg"=>"Admin dashboard"], compact('complains'));
    }

    public function buyerHome()
    {   $user_id = Auth::user()->id;
        
        $posts= Post::where('user_id', Auth::id())->latest()->simplePaginate(5);
    
        $applications = Application::select( 'applications.*')
        ->join('posts', 'posts.id', '=', 'applications.post_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->where('posts.user_id', $user_id)
        ->simplePaginate(5);

        // return response()->json($applications);

        return view('dashboard.buyer',["msg"=> "Buyer dashboard"], compact('posts', 'applications') );
    }
    
    public function sellerHome()
    {
        $user_id = Auth::user()->id;
        
        $applications = Application::select( 'applications.*', 'posts.title')
        ->join('posts', 'posts.id', '=', 'applications.post_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->where('applications.user_id', $user_id)
        ->simplePaginate(5);

        
        return view('dashboard.seller', ["msg"=> "Seller dashboard"], compact('applications'));
    }
}
