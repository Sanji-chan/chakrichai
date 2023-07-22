@extends('layouts.app')


@section('content')
<div class="post-bg">
    <div class="container">
   
        <div class="row mt-4">
            <div class="col-lg-10 m-auto">
            
            <div class="card mb-lg-0">
                <div class="card-header m-2">
                    <h4>{{ $post->title }}</h4>
                    <span>{{ $post->created_at }}</span>
                </div>
                
                <div class="card-body form-group col justify-content-center ">
                <div class="row">
                    <p>{{ $post->details }}</p>
                    <p>Deadline: {{ $post->end_date }}</p>
                    <p>Tag: {{ $post->tag }}</p>
                    <p>Job status: {{ $post->status }}</p>
                    <p>Salary: {{ $post->price }}</p>

                    @if (Auth::user()->role == 'seller')                   
                        <form action="#" method="POST">
                            @csrf
                            <button type="submit"  class="btn btn-primary secondary-button">Apply</button>
                        </form>
                    @endif
                </div>
               
                </div>
            </div>
</div>
@endsection
