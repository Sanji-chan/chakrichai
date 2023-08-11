<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

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
        return view('applications.create', compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $posts= Application::select( '*')
        ->where('post_id', $request['post_id'])
        ->where('user_id', str(Auth::id()))
        ->get();

        if (sizeof($posts)>0){
            session()->put('warning', 'Already Applied. New application is not accepted.');
            return redirect()->back();
        }
        
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
            $resume = $request->file('resume');
            $resumePath = 'resume';
            $resumeName = str(Auth::id()). "_" . $validatedData['post_id']. "." . $resume->getClientOriginalExtension();;
            $resume->move($resumePath, $resumeName);
            $validatedData['resume'] = $resumeName;
        }


        $post = new Application();
        $post->name = $validatedData['name'];
        $post->uni_name = $validatedData['uni_name'];
        $post->age = $validatedData['age'];
        $post->semester = $validatedData['semester'];
        $post->major = $validatedData['major'];
        if (isset($validatedData['resume'])){
            $post->resume = $validatedData['resume'];
        }
       
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

        session()->put('success', 'Appliaction created successfully.');
        return redirect()->route('seller.home');
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

    public function getresume($fileName)
    { 
        $filePath = public_path('resume/' . $fileName);
        
        if (file_exists($filePath)) {
            return Response::file($filePath);
        } else {
            abort(404, 'File not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editstatus(string $id)
    {
        // No view for editstatus created
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
        session()->put('success', 'Application status changed successfully.');
        return redirect()->route('buyer.home');      
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $post)
    {
        $post->delete();
        session()->put('success', 'Application deleted successfully.');
        return redirect()->route('posts.index');
    }
}
