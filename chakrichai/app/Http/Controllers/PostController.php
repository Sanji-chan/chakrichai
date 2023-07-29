<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
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

        // Handle file upload if necessary
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('public/photos');
            $validatedData['photo'] = $photoPath;
        }

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->details = $validatedData['details'];
        $post->tag = $validatedData['tag'];
        $post->end_date = $request['date'];
        $post->price = $validatedData['price'];
        $post->status = $validatedData['status'];
        $post->user_id =  str(Auth::id());
        // Set other fields

        // Generate a random slug and check if it's unique
        do {
            $slug = Str::random(10); // You can specify the desired length of the slug here
        } while (Post::where('slug', $slug)->exists());

        // Save the slug to the post
        $post->slug = $slug;
        // Save the post to the database
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function show($slug)
    {
        // return response()->json(Auth::user()->role );
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
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

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Application $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function searchPosts(Request $request) 
    {
    if ($request->searchposts)
        {
            
            $searchPosts = DB::table('posts')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->selectRaw("*")
                ->where("users.name","like","%$request->searchposts%")
                ->orWhere("title","like","%$request->searchposts%")
                ->orWhere("tag","like","%$request->searchposts%")
                ->orWhere("status","like","%$request->searchposts%")
                ->get();

                
            
            return view("posts.searchposts",compact("searchPosts"));
        }
    else
        {
            return redirect()->back();

        }
    }

}
