@extends('layouts.app')

@section('content')
<div class="profile-bg">
    <div class="container">

      <div class="row">
        <div class="col-lg-3 mt-5">
          <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action" href="#list-item-1">User Details</a>
            <a class="list-group-item list-group-item-action" href="#list-item-2">Edit Profile</a>
            <a class="list-group-item list-group-item-action" href="#list-item-3">Edit Social links</a>

            <a class="list-group-item list-group-item-action" href="#list-item-4">Deactivate Account</a>
            
          </div>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-8">
          <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
            <h4 id="list-item-1" class = "content-header mb-4">User Details</h4>
            <div class="col-lg-8">
              <div class="row">
                <div class="col">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                  class="rounded-circle img-fluid mt-3" style="width: 150px; border: 5px solid #a5a4a423;">
               
                </div>
                <div class="col-sm-8">
                  <h5 class="mt-4" style="color: #eeaeca;">{{ $profile->name }}</h5>
                  <p> {{ $profile->email }}</p>
                  <button type="" class="btn secondary-button main-button ">Edit picture</button>


                </div>
              </div>
            
               

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
            
                <button type="submit" class="btn btn-primary main-button">Update</button>
            </form>
            </div>
            
            <h4 id="list-item-4" class = "content-header my-4">Deactivate Account</h4>
            <p>...</p>

          </div>
        </div>
      </div>

        </div>
    </div>
</div>

@endsection