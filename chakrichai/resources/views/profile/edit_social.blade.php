@extends('layouts.app')

@section('content')
<div class="profile-bg">
    <div class="container">

      <div class="row">
        <div class="col-lg-3 mt-5">
          {{-- profile navigation --}}
          <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action " href="{{ route('profile.show', Auth::user()->id) }}">User Details</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit', Auth::user()->id) }}">Edit Profile</a>
            <a class="list-group-item list-group-item-action active" href="{{ route('profile.edit_social', Auth::user()->id) }}">Edit Social links</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_bio', Auth::user()->id) }}">Add bio</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_active_status', Auth::user()->id) }}">Deactivate Account</a>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
            <h4 id="list-item-3" class = "content-header my-4">Edit Social links</h4>
            <div class="col-lg-10">
              <form action="{{ route('profile.update_social') }}" class="m-3" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Facebook</label>
                    <input type="text" class="form-control mb-3" id="facebooklink" name="facebooklink" placeholder="{{ $profile->facebooklink }}" value="{{ $profile->facebooklink }}">
                    <label for="">Instagram</label>
                    <input type="text" class="form-control  mb-3" id="instagramlink" name="instagramlink" placeholder="{{ $profile->instagramlink }}" value="{{ $profile->instagramlink }}">
                    <label for="">Github</label>
                    <input type="phone" class="form-control mb-3" id="githublink" name="githublink" placeholder="{{ $profile->githublink }}" value="{{ $profile->githublink }}">
                    <label for="">LinkedIn</label>
                    <input type="text" class="form-control mb-3" id="linkedinlink" name="linkedinlink" placeholder="{{ $profile->linkedinlink }}" value="{{ $profile->linkedinlink }}">
                </div>
            
                <button type="submit" class="btn btn-primary main-button">Save</button>
            </form>
            
    
          </div>
        </div>
      </div>

        </div>
    </div>
</div>

@endsection