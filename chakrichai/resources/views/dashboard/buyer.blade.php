@extends('layouts\app_dashboad')


@section('dashboard_content')

<div class="row">
    <div class="card mb-4 mb-lg-0">
        <div class="card-header m-2 bg-light"><h4>Post/Find a job section</h4></div>
        <div class="card-body col justify-content-end ">
            <form action="#">
                <div class="">
                    <textarea class="form-control mb-2 rounded "  placeholder="Post a job request..." rows="3"></textarea>
                    <a href="#"><button  class="btn btn-primary secondary-button" >Post</button></a>
                </div>
            </form>
        </div>
    </div>
  </div>

@endsection
