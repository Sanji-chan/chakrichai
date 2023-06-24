<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackgoogle(){
            $google_user = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $google_user->id)->first(); // check if user exists in DB
            // echo($google_user->id);
            if (!$user){
                $new_user = User::insert([
                    'name'=>$google_user->name,
                    'email'=>$google_user->email, 
                    'google_id'=>$google_user->id
                ]);
                $user = User::where('google_id', $google_user->id)->first();
                Auth::login($user);
                return redirect()->to(route("login"));
            }else{
                Auth::login($user);
                return redirect()->to(route("login"));
            }

    }

}
