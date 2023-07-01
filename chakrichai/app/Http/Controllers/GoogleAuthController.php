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
            try{
                    if (!$user){
                        $role = 1;
                        if (strpos($google_user->email, "g.bracu.ac.bd") != false){
                            $role = 2;
                        }
            
                        $new_user = User::insert([
                            'name'=>$google_user->name,
                            'email'=>$google_user->email, 
                            'google_id'=>$google_user->id,
                            'role' => $role
                    ]);

                    $user = User::where('google_id', $google_user->id)->first();
                    Auth::login($user);
                    // return redirect()->to(route("login"));
                    if (auth()->user()->role == 'admin') 
                    {
                       return redirect()->route('admin.home');
                    }
                    else if (auth()->user()->role == 'buyer') 
                    {
                        return redirect()->route('buyer.home');
                    }
                    else
                    {
                        return redirect()->route('seller.home');
                    }
                }else{
                    Auth::login($user);
                    // return redirect()->to(route("login"));
                    if (auth()->user()->role == 'admin') 
                    {
                       return redirect()->route('admin.home');
                    }
                    else if (auth()->user()->role == 'buyer') 
                    {
                        return redirect()->route('buyer.home');
                    }
                    else
                    {
                        return redirect()->route('seller.home');
                    }
                }
            }
            catch(\Throwable $th){
                echo "This email exists, login in with password";
            }




    }

}
