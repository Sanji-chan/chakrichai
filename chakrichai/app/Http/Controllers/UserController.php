<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
                ->selectRaw("*")
                ->where("role","=","1")
                ->get();
            }
            elseif (strtolower($request->search) == "seller") { 
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("*")
                ->where("role","=","2")
                ->get();
            }
            else{
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("*")
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

    public function filterUsers($num) 
    {   
        //return response()->json($num);
        if ($num)
        {
            if ($num == 1){
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("*")
                ->orderBy("user_profiles.avg_rating","DESC")
                ->paginate(3);   
            }

            else if ($num == 2){
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("*")
                ->orderBy("user_profiles.avg_rating","DESC")
                ->limit(10)
                ->get();   
            }

            else{
                $searchUsers = DB::table('users')
                ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
                ->selectRaw("*")
                ->orderBy("user_profiles.avg_rating")
                ->limit(5)
                ->get(); 

            }

            return view("search",compact("searchUsers"));

        }
    }

    // public function filterUsers($num) 
    // {   
    //     //return response()->json($num);
    //     if ($num)
    //     {
    //         if ($num == 1){
    //             $searchUsers = DB::table('users')
    //             ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
    //             ->selectRaw("*")
    //             ->orderBy("user_profiles.avg_rating","DESC")
    //             ->paginate(5);   
    //         }

    //         else if ($num == 2){
    //             $searchUsers = DB::table('users')
    //             ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
    //             ->selectRaw("*")
    //             ->orderBy("user_profiles.avg_rating","DESC")
    //             ->limit(10)
    //             ->get();   
    //         }

    //         else{
    //             $searchUsers = DB::table('users')
    //             ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
    //             ->selectRaw("*")
    //             ->orderBy("user_profiles.avg_rating")
    //             ->limit(5)
    //             ->get(); 

    //         }

    //         return view("search",compact("searchUsers"));

    //     }
    // }

    public function rating(Request $request)
    {
        $post = Post::findOrfail($request->post_id);
        $user = User::findOrfail($request->user_id);
        $profile = $user->profile;
        $rating = $request->rating;

        $total_raters = $profile->total_raters;
        $avg_rating = $profile->avg_rating;

        $new_total_raters = $total_raters + 1;
        $new_avg_rating = ($avg_rating * $total_raters + $rating) / $new_total_raters;

        $profile->total_raters = $new_total_raters;
        $profile->avg_rating = $new_avg_rating;

        $profile->save();

        if (auth()->user()->role == 'buyer') {
            $post->buyer_rating = 1;
        } else if(auth()->user()->role == 'seller') {
            $post->seller_rating = 1;
        }

        $post->save();

        return redirect()->back();
    }
}
