@extends('layouts.app')

@section('content')
<div class="profile-bg">
    <div class="container">

      <div class="row">
        <div class="col-lg-3 mt-5">
          {{-- profile navigation --}}
          <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action " href="{{ route('profile.show') }}">User Details</a>
            <a class="list-group-item list-group-item-action active" href="{{ route('profile.edit') }}">Edit Profile</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_social') }}">Edit Social links</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_bio') }}">Add bio</a>
            <a class="list-group-item list-group-item-action" href="{{ route('profile.edit_active_status') }}">Deactivate Account</a>
          </div>
        </div>
        <div class="col-lg-1"> </div>
        <div class="col-lg-8">
            <h4 id="list-item-1" class = "content-header my-4">User Details</h4>
            <div class="row">
             
                <div class="col-sm-3">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                  class="rounded-circle img-fluid mt-3" style="width: 150px; border: 2px solid #a5a4a423;">
                </div>
                <div class="col-sm-4">
                  <h5 class="mt-4" style="color: #eeaeca;">{{ $profile->name }}</h5>
                  <p class="m-2"> {{ $profile->position }}
                      <br>
                      {{ $profile->email }}
                  </p>
        
                  <button type="submit" class="btn secondary-button main-button ">Edit picture</button>
                </div>
                <div class="col-sm-5 mt-5">
                    <p> 
                      Lorem ipsum, dolor sit adipisicing elit. Quia exercitationem quas corporis animi, illo?
                      
                    </p>
                </div>
              
              <div class="row">
                <div class="col-lg-10">
            <h4 id="list-item-2 " class = "content-header my-4">Edit Profile</h4>
            <div class="col-lg-10">
             
              <form action="{{ route('profile.update') }}" class="m-3" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="">Work Position</label>
                      <input type="text" class="form-control mb-3" id="position" name="position" placeholder="{{ $profile->position }}" value="{{ $profile->position }}">
                      <label for="">Education</label>
                      <input type="text" class="form-control  mb-3" id="education" name="education" placeholder="{{ $profile->education }}" value="{{ $profile->education }}">
                      <label for="">Contact</label>
                      <input type="phone" class="form-control mb-3" id="contact" name="contact" placeholder="contact" value="{{ $profile->contact}}">
                      <label for="">Address</label>
                      <input type="text" class="form-control mb-3" id="address" name="address" placeholder="Address" value="{{ $profile->address }}">
                      <label for="">Date of birth</label>
                      <input type="text" class="form-control mb-3" id="dob" name="dob" placeholder="Date of birth" value="{{ $profile->dob }}">
                  </div>
                  <button type="submit" class="btn btn-primary main-button">Update</button>
              </form>
            </div>

          </div>
          </div>
        </div>
      </div>


        </div>
    </div>
</div>

@endsection