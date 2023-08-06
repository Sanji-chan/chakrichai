<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::sortable()->paginate();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'nullable',
            'tag' => 'nullable',
            'end_date' => '',
            'price' => 'required',
            'status' => 'required',
            'photo' => 'nullable',
            'details' => 'nullable',
            'user_id' => 'nullable'
        ]);

          // Generate a random slug and check if it's unique
        do {
            $slug = Str::random(10); // You can specify the desired length of the slug here
        } while (Post::where('slug', $slug)->exists());

        
        // Handle file upload if necessary
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = 'post_photo';
            $photoName = str(Auth::id()). "_" .$slug . "." . $photo->getClientOriginalExtension();;
            $photo->move($photoPath, $photoName);
            $validatedData['photo'] = $photoName;
        }


        $post = new Post();
        $post->title = $validatedData['title'];
        $post->details = $validatedData['details'];
        $post->tag = $validatedData['tag'];
        $post->end_date = $request['date'];
        $post->price = $validatedData['price'];
        $post->status = $validatedData['status'];
        $post->user_id =  str(Auth::id());
        // Save the attachment to the post
        if (isset($validatedData['photo'])){
            $post->photo = $validatedData['photo'];
        }
        // Save the slug to the post
        $post->slug = $slug;

        // Save the post to the database
        $post->save();
        session()->put('success', 'Post created successfully.');
        return redirect()->route('posts.index');
    }


    public function show($slug)
    {
        // return response()->json(Auth::user()->role );
        $post = Post::where('slug', $slug)->firstOrFail();

        $comments = DB::table("comments")
        ->join("users","users.id", "=", "comments.user_id")
        ->select("*")
        ->where("post_id",$post->id)
        ->get();

        $likes = DB::table("likes")
        ->join("users","users.id", "=", "likes.user_id")
        ->select("*")
        ->where("post_id",$post->id)
        ->get(); 

        $liked = DB::table("likes")
        ->select("*")
        ->where("post_id",$post->id)
        ->where("likes.user_id", Auth::id())
        ->get(); 

        // return response()->json($liked);
        
        return view('posts.show', compact('post',"comments","likes", "liked"));
    }
    

    public function edit(Post $post)
    {   
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {   
        // return response()->json($request);
        $validatedData = $request->validate([
            'title' => 'nullable',
            'slug' => 'nullable',
            'tag' => 'nullable',
            'end_date' => 'nullable',
            'price' => 'nullable',
            'status' => 'nullable',
            'photo' => 'nullable',
            'details' => 'nullable',
            'user_id' => 'nullable'
        ]);
        
        foreach($validatedData as $x => $val) {
            if ($val != null){
                $post->$x = $val;
            }
          }

        $post->save();
        session()->put('success', 'Post updated successfully.');
        return redirect()->route('posts.index');
    }

    public function getpostimg($fileName)
    { 
        $filePath = public_path('post_photo/' . $fileName);
        
        if (file_exists($filePath)) {
            return Response::file($filePath);
        } else {
            abort(404, 'File not found');
        }

    }

    public function destroy(Post $post)
    {
        $post->delete();
        session()->put('success', 'Post deleted successfully.');
        return redirect()->route('posts.index');
    }

    public function searchPosts(Request $request) 
    {
    if ($request->searchposts)
        {
            $searchPosts = Post::select("*")
                ->where("title","like","%$request->searchposts%")
                ->orWhere("tag","like","%$request->searchposts%")
                ->orWhere("status","like","%$request->searchposts%")
                ->sortable()
                ->paginate();
            
            return view("posts.searchposts",compact("searchPosts"));
        }
    else
        {
            return redirect()->back();

        }
    }

}
