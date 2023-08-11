<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class LikesController extends Controller
{
    public function index()
    {
        //
    }

    public function control(Request $request)
    {
        $check = Likes::select("*")
        ->where('post_id', $request['post_id'])
        ->where('user_id', str(Auth::id()));

        if (sizeof($check->get())>0)
        {
            $check->delete();
            
            session()->put('success', 'Unliked post');
            return redirect()->back();
        }
        else
        {
            $validatedData = $request->validate([
                'user_id' => 'nullable',
                'post_id' => 'nullable',
            ]);

            $like = new Likes();
        
            $like->user_id =  str(Auth::id());
            $like->post_id =  $validatedData['post_id'];

            $like->save();

            session()->put('success', 'Liked post');
            return redirect()->back();

        }

    }

}
