<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        // $profile = Auth::user()->profile;


        $profiles = DB::table('users')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->select('user_profiles.*', 'users.name', 'users.email', 'users.role')
            ->get();

        foreach ($profiles as $profile) {
            if ($profile->user_id == Auth::user()->id){
                // $profileName = $profile->name;
                // $profileEmail = $profile->email;
                return view('profile.show', compact('profile'));
            }
        }
            // Access other profile and user attributes as needed

            // $user = User::find(Auth::user()->id);
            // $profile = $user->profile;
            // $profile = $user;

            // return view('profile.show', compact('profile'));


        
    }

    public function edit()
    {
        $profile = Auth::user()->profile;

        // Check if the authenticated user is allowed to edit their profile
        if ($this->canEditProfile($profile)) {
            return view('profile.edit', compact('profile'));
        }

        abort(403, 'Unauthorized');
    }

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
                // ,
                // '' => 'required',
                // '' => 'required'
                // Add validation rules for other profile fields
            ]);

            // Update the profile with the validated data
            $profile->update($validatedData);

            return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
        }

        abort(403, 'Unauthorized');
    }

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