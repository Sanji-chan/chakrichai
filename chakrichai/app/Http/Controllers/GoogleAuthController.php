<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Session;

class GoogleAuthController extends Controller
{   

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callbackgoogle(Request $request){
            $google_user = Socialite::driver('google')->stateless()->user();
            // echo($google_user->id);
            $request->all();

            $user = User::where('google_id', $google_user->id)->first(); // check if user exists in DB
    
            $google2fa = app('pragmarx.google2fa');
            $registration_data = $request->all();
           
            $registration_data["name"] = $google_user->name;
            $registration_data["email"] = $google_user->email; 
            $registration_data["google_id"] = $google_user->id;
            $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

            // session()->put(['registration_data' => $registration_data]);

            // $request->session()->push('registration_data', $registration_data);
            // Session::put('registration_data', $registration_data);
            session::put( 'registration_data', $registration_data);


            // return response()->json(session::get('registration_data'));
            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $registration_data['email'],
                $registration_data['google2fa_secret']
            );
            if ($user){
                return $this->google_create($request);
            }
            else{
                return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret'], 'google' => true]);
    
            }
        }

    public function google_create(Request $request){
        
        $request->merge(session::get('registration_data'));       
        // return response()->json();
        return $this->create($request->only(['name', 'email', 'google_id', 'google2fa_secret']));
    }
    protected function create(array $data){
        $user = User::where('google_id', $data['google_id'])->first(); // check if user exists in DB
        try{
            
            if (!$user){
                $role = 1;
                if (strpos($data['email'], "g.bracu.ac.bd") != false){
                    $role = 2;
                }

                $new_user = User::insert([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'google_id'=> $data['google_id'],
                    'google2fa_secret' => encrypt($data['google2fa_secret']),
                    'role' => $role,
                 ]);


                $user = User::where('google_id', $data['google_id'])->first();

                $profile = UserProfile::create([
                    'user_id' => $user->id,
                    'bio' => 'No bio added for User ' . $user->id,
                    // Add other attributes and their values here
                ]);

                Auth::login($user);
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
            else{
                Auth::login($user);

                // if (auth()->user()->role == 'admin') 
                // {
                // return redirect()->route('admin.home');
                // }
                // else if (auth()->user()->role == 'buyer') 
                // {
                //     return redirect()->route('buyer.home');
                // }
                // else
                // {
                //     return redirect()->route('seller.home');
                // }
                return redirect()->route('home');
            }
        }
        catch(\Throwable $th){
            echo "This email exists, login in with password";
        }

    }



}
