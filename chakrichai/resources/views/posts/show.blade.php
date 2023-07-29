@extends('layouts.app')


@section('content')
<div class="post-bg" style="background-color: #a5a4a423;">
    <div class="container">
   
        <div class="row mt-4">
            <div class="col-lg-8 m-auto">
            
            <div class="card mb-lg-0">
                <div class="card-header m-2">
                    <h4>{{ $post->title }}</h4>
                    <p class="text-muted mb-0" style="font-size: 14px">Created at: {{ $post->created_at }}</p>
                </div>
                
                <div class="card-body form-group col justify-content-center ">
                <div class="row">
                    <p>{{ $post->details }}</p>
                    <p>Deadline: {{ $post->end_date }}</p>
                    <p>Tag: {{ $post->tag }}</p>
                    <p>Job status: {{ $post->status }}</p>
                    <p>Salary: {{ $post->price }}</p>
                    @if ($post->photo != "")
                        <p>Post attachment: <a href="{{route('posts.getpostimg', $post->photo) }}" target="_blank"  rel="noopener" method="GET">{{ $post->photo }}</a></p>
                    @endif
                    
                    @if (Auth::user()->role == 'seller')                   
                        <form action="{{ route('applications.create') }}" method="GET">
                            @csrf
                            <input type="hidden" name="post_id" value={{ $post->id }}>
                            <button type="submit"  class="btn btn-primary secondary-button">Apply</button>
                        </form>
                    @endif
                </div>
               
                </div>
                <div class="card-footer pt-2 m-2">
                    <div class="row m-auto">
                        <div class="col text-center">
                            <i class="fas fa-solid fa-heart"></i> Like
                        </div>
                        <div class="col text-center">
                            <i class="fas fa-regular fa-comment"></i>  Comment
                        </div>
                        <div class="col text-center">
                            <i class="fas fa-solid fa-share"></i>  Share
                        </div>
                    </div>
                    
                </div>
            </div>
</div>
@endsection
