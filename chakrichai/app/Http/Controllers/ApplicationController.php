<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        // return response()->json($request);
        return view('applications.create', compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'nullable',
            'uni_name' => 'nullable',
            'age' => 'integer|nullable',
            'semester' => 'nullable',
            'major' => 'nullable',
            'resume' => 'nullable',
            'user_id' => 'nullable',
            'post_id' => 'nullable',
        ]);
        // return response()->json($validatedData);

        // Handle file upload if necessary
        if ($request->hasFile('resume')) {
            $photo = $request->file('resume');
            $photoPath = $photo->store('public/resume');
            $validatedData['resume'] = $photoPath;
        }

        $post = new Application();
        $post->name = $validatedData['name'];
        $post->uni_name = $validatedData['uni_name'];
        $post->age = $validatedData['age'];
        $post->semester = $request['semester'];
        $post->major = $validatedData['major'];
     
        $post->user_id =  str(Auth::id());

        $post->post_id =  $validatedData['post_id'];
        // Set other fields

         // Generate a random slug and check if it's unique
         do {
            $slug = Str::random(10); // You can specify the desired length of the slug here
        } while (Application::where('slug', $slug)->exists());

        // Save the slug to the post
        $post->slug = $slug;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Appliaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $application = Application::where('slug', $slug)->firstOrFail();    
        $post = Post::where('id', $application->post_id)->firstOrFail();   
        return view('applications.show', compact('application', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editstatus(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatestatus(Request $request, $id)
    {   

        $post = Application::where('id', $id)->firstOrFail();   

        $validatedData= $request->validate([
            'status' => 'nullable'
        ]);
        $post->status = $validatedData ['status'];

        // return response()->json($post);

        $post->update();
        return redirect()->route('buyer.home')->with('success', 'Status changed successfully.');      
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
