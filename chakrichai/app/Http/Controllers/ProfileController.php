<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function show($slug)
    {
        $profiles = DB::table('users')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select('user_profiles.*', 'users.name', 'users.email', 'users.role')
            ->get();

        foreach ($profiles as $profile) {
            if ($profile->user_id == $slug){
                return view('profile.show', compact('profile'));
            }
        }
        
        // foreach ($profiles as $profile) {
        //     if ($profile->user_id == Auth::user()->id){
        //         return view('profile.show', compact('profile'));
        //     }
        // }
    }
    
    // all edit view functions starts here
    public function edit($slug)
    {
        $profiles = DB::table('users')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select('user_profiles.*', 'users.name', 'users.email', 'users.role')
            ->get();

        foreach ($profiles as $profile) {
            if ($profile->user_id == Auth::user()->id){
                if ($this->canEditProfile($profile)) {
                    return view('profile.edit', compact('profile'));
                }
            }
        }
        // Check if the authenticated user is allowed to edit their profile
        if ($this->canEditProfile($profile)) {
            return view('profile.edit', compact('profile'));
        }

        abort(403, 'Unauthorized');
    }

    public function edit_bio($slug)
    {
        $profiles = DB::table('users')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select('user_profiles.*', 'users.name', 'users.email', 'users.role')
            ->get();

        foreach ($profiles as $profile) {
            if ($profile->user_id == Auth::user()->id){
                if ($this->canEditProfile($profile)) {
                    return view('profile.edit_bio', compact('profile'));
                }
            }
        }
        abort(403, 'Unauthorized');
    }

    public function edit_social($slug)
    {
        $profiles = DB::table('users')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select('user_profiles.*', 'users.name', 'users.email', 'users.role')
            ->get();

        foreach ($profiles as $profile) {
            if ($profile->user_id == Auth::user()->id){
                if ($this->canEditProfile($profile)) {
                    return view('profile.edit_social', compact('profile'));
                }
            }
        }
        abort(403, 'Unauthorized');
    }

    public function edit_active_status($slug)
    {
        $profiles = DB::table('users')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select('user_profiles.*', 'users.name', 'users.email', 'users.role')
            ->get();
            
        foreach ($profiles as $profile) {
            if ($profile->user_id == Auth::user()->id){
                if ($this->canEditProfile($profile)) {
                    return view('profile.edit_active_status', compact('profile'));
                }
            }
        }
        abort(403, 'Unauthorized');
    }

    // update classes starts here
    
    public function update(Request $request)
    {
        $profile = Auth::user()->profile;
        // Check if the authenticated user is allowed to update their profile
        if ($this->canEditProfile($profile)) {
            // Validate the request data
            $validatedData = $request->validate([
                'position' => 'required',
                'education' => 'required',
                'contact' => 'required',
                'address' => 'required',
                'dob' => 'required'
                // Add validation rules for profile fields
            ]);
            // Update the profile with the validated data
            $profile->update($validatedData);
            session()->put('success', 'Profile updated successfully.');
            return redirect()->route('profile.show', Auth::user()->id);
        }

        abort(403, 'Unauthorized');
    }

    public function update_social(Request $request)
    {
        $profile = Auth::user()->profile;
        // Check if the authenticated user is allowed to update their profile
        if ($this->canEditProfile($profile)) {
            // Validate the request data
            $validatedData = $request->validate([
                'facebooklink' => '',
                'instagramlink' => '',
                'githublink' => '',
                'linkedinlink' => '',
                // Add validation rules for other social media fields
            ]);
            // Update the profile with the validated data
            $profile->update($validatedData);
            session()->put('success', 'Profile updated successfully.');
            return redirect()->route('profile.show', Auth::user()->id);
        }
        abort(403, 'Unauthorized');
    }

    public function update_bio(Request $request)
    {   
        $profile = Auth::user()->profile;
        // Check if the authenticated user is allowed to update their profile
        if ($this->canEditProfile($profile)) {
            // Validate the request data
            $validatedData = $request->validate([
                'bio' => 'max:255',                 // Add validation rules for bio
            ]);
            // Update the profile with the validated data
            $profile->update($validatedData);
            session()->put('success', 'Profile updated successfully.');
            return redirect()->route('profile.show', Auth::user()->id);
        }
        abort(403, 'Unauthorized');
    }

    public function update_active_status(Request $request)
    {   
        $profile = Auth::user()->profile;
        // Check if the authenticated user is allowed to update their profile
        // if ($this->canEditProfile($profile)) {
         
        // }
        abort(403, 'Unauthorized');
    }

    //edit option validation
    private function canEditProfile($profile)
    {
        $authenticatedUser = Auth::user();
        // Check if the authenticated user has the role 'admin' or if the profile belongs to the authenticated user
        if ($authenticatedUser->role == 0 || $profile->user_id === $authenticatedUser->id) {
            return true;
        }
        return false;
    }
}