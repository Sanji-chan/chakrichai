@extends('layouts.app')

@section('content')
<div class="profile-bg">
    <div class="container">

      <div class="row">
        <div class="col-lg-3 mt-5">
          {{-- profile navigation --}}
          <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action " href="{{ route('profile.show') }}">User Details</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit') }}">Edit Profile</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_social') }}">Edit Social links</a>
            <a class="list-group-item list-group-item-action active" href="{{ route('profile.edit_bio') }}">Add bio</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_active_status') }}">Deactivate Account</a>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
            <h4 id="list-item-4" class = "content-header my-4">Add bio</h4>
            <div class="col-lg-10">
              <form action="{{ route('profile.update_bio') }}" class="m-3" method="POST">
                @csrf
                <div class="form-group">
                    <textarea type="text" class="form-control mb-3" id="bio" name="bio" aria-label="Post" aria-describedby="post-addon">{{ $profile->bio }}</textarea>
                    <button type="submit" class="btn btn-primary main-button">Save</button>
                </div>
              </form>
            </div>
    
          </div>
        </div>
      </div>

        </div>
    </div>
</div>

@endsection