@extends('layouts.app')

@section('content')
<div class="profile-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <h1>Edit Profile</h1>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <!-- Add form fields for editing profile information -->
            <div class="form-group">
                <input type="text" class="form-control" id="position" name="position" placeholder="Work position" value="{{ $profile->position }}">
                <input type="text" class="form-control" id="education" name="education" placeholder="Education" value="{{ $profile->education }}">
                <input type="text" class="form-control" id="contact" name="contact" placeholder="contact" value="{{ $profile->contact}}">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $profile->address }}">
                <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of birth" value="{{ $profile->dob }}">
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>

                  {{-- user image card --}}
        <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                  class="rounded-circle img-fluid mt-3" style="width: 150px; border: 5px solid #a5a4a423;">
                <h5 class="mt-3">{{ $profile->user_name }}</h5>
                <p class="text-muted mb-1">{{ $profile->position }}</p>
                <div class="d-flex justify-content-center mb-2">
                  <a href="{{ route('profile.edit') }}">
                      <button type="button" class="btn btn-primary" style="background: #eeaeca; border: 1px solid #eeaeca;">Edit Profile</button>
                  </a>
                  <a href="#">
                      <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                  </a>
                </div>
              </div>
            </div>
  
            {{-- user contact card --}}
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">example@example.com</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">(097) 234-5678</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Social media card-->
            <div class="card mb-4">
              <div class="card-body col-lg m-auto">
                   
                   <div class="text-center">
                      <!-- Facebook -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="text-center fab fa-facebook-f"></i>
                      </a>
              
                      <!-- Twitter -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                      <i class="text-center fab fa-twitter"></i> 
                      </a>
              
                      <!-- Google -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="text-center fab fa-google"></i>
                      </a>
              
                      <!-- Instagram -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button"> 
                          <i class=" text-center fab fa-instagram"></i>
                      </a>
              
                      <!-- Linkedin -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="text-center fab fa-linkedin"></i>
                      </a>
                      <!-- Github -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="text-center fab fa-github"></i>
                      </a>
                  </div>
  
              </div>
            </div>
          </div>

        </div>
    </div>
</div>

@endsection