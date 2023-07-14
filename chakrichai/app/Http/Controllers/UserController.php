<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserProfile;

class UserController extends Controller
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

    public function searchUsers(Request $request) 
    {
        if ($request->search)
        {
            if (strtolower($request->search) == "buyer"){
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("name,email,role,user_profiles.position,user_profiles.education")
                ->where("role","=","1")
                ->get();
            }
            elseif (strtolower($request->search) == "seller") { 
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("name,email,role,user_profiles.position,user_profiles.education")
                ->where("role","=","2")
                ->get();
            }
            else{
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("name,email,role,user_profiles.position,user_profiles.education")
                ->where("name","like","%$request->search%")
                ->orWhere("email","like","%$request->search%")
                ->orWhere("user_profiles.position","like","%$request->search%")
                ->orWhere("user_profiles.education","like","%$request->search%")
                ->get();
            }
            
            return view("search",compact("searchUsers"));
        }
        else
        {
            return redirect()->back();

        }
    }
}
