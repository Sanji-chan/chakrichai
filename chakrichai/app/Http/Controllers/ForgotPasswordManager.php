<?php
namespace app\Http\Controllers;
// use App\Http\Controllers\Controller;
use App\Models\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;  
use Illuminate\Support\Str;
class ForgotPasswordManager extends Controller
{
    function forgotPassword(){
        return view(view: "auth.passwords.email");
    }

    function forgotPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' =>$token,
            'created_at' => Carbon::now()
        ]); //insert data at password reset

        // send an email to users to give them the resent link
        Mail::send("emails.forgotpassword", 
                    ['token'=>$token], 
                    function ($message) use ($request){
                        $message -> to($request->email);
                        $message -> subject("Reset Account Password Chakrichai");
                    }
                );
        return redirect()->to(route(name: "forgot.password"))
            -> with('success', "We have sent an email to rest you password.");
    }

    function resetPassword($token){
        return view("auth.passwords.reset", compact('token'));
    }

    // email and password validation
    function resetPasswordPost(Request $request){
        $request->validate([
            "email"=> "required|email|exists:users",
            "password" => "required|string|min:8|confirmed",
            "password_confirmation" => "required"
        ]);

        $updatePassword = DB::table("password_resets")
            ->where([
                "email" => $request->email,
                "token" => $request->token
            ])->first();

        if(!$updatePassword){ 
            return redirect()->to(route("reset.password"))
                ->with("error", "Invalid input.");
        }
        
        // update user table
        User::where("email", $request->email)
            ->update(["password"=>Hash::make($request->password)]);
        
        // remove generated token from password_rest table
        DB::table('password_resets')
            ->where(["email"=>$request->email])->delete();
        return redirect()->to(route("login"))->with("success", "Password resrt successfully." );
    }
}
