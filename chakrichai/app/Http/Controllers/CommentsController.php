<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    public function index()
    {

        //

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'content' => 'required',
            'user_id' => 'nullable',
            'post_id' => 'nullable',
        ]);

        $comment = new Comments();
        $comment->content = $validatedData['content'];
        $comment->user_id =  str(Auth::id());
        $comment->post_id =  $validatedData['post_id'];
        
        $comment->save();

        session()->put('success', 'Comment created successfully.');
        return redirect()->back();
    }

}


