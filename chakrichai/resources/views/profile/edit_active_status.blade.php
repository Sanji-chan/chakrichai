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
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_bio') }}">Add bio</a>
            <a class="list-group-item list-group-item-action active" href="{{ route('profile.edit_active_status') }}">Deactivate Account</a>  
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
            <h4 id="list-item-5" class = "content-header my-4">Deactivate Account</h4>
            <p>Current account status: <<--->></p>
            <a href="#">Deactivate my account</a>
            <p class="">Warning: This change may reset in removal of your personal information</p>

    
          </div>
        </div>
      </div>

        </div>
    </div>
</div>

@endsection