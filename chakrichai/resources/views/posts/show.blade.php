use App\Models\Comments;

@extends('layouts.app')


@section('content')
<div class="post-bg" style="background-color: #a5a4a423;">
    <div class="container">
   
        <div class="row">
            @include('layouts.flash_messages')
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
                    <p>Remuneration: {{ $post->price }} BDT</p>
                    @if ($post->photo != "")
                        <p>Post attachment: <a href="{{route('posts.getpostimg', $post->photo) }}" target="_blank"  rel="noopener" method="GET">{{ $post->photo }}</a></p>
                    @endif

                    @if (Auth::user()->role == 'seller')            
                        @if ($post->status != 'completed')       
                            <form action="{{ route('applications.create') }}" method="GET">
                                @csrf
                                <input type="hidden" name="post_id" value={{ $post->id }}>
                                <button type="submit"  class="btn btn-primary secondary-button">Apply</button>
                            </form>
                        @else
                            <strong><p class="warning">*** Job is complete no more application will be accepted. ***</p></strong>
                        @endif
                    @endif
                </div>

                
                <span> 
                    {{$likes->count()}} people liked this post</span>
                </div>
                <div class="card-footer pt-2 m-2">
                    <div class="row m-auto">

                        
                        <div class="col text-center">
                            <div>
                                <form method="get" action="{{ route('likes.controller') }}">
                                    <!-- Submit button -->
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                    <button type="submit" value="like" class="btn btn-block"> <i class="fas fa-solid fa-thumbs-up"></i>
                                        Like
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="col text-center mt-2">
                            <i class="fas fa-solid fa-share"></i>  Share
                        </div>
                    </div>


       
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="card mb-lg-0">
                <div class="card-header m-2">
                    <h5>Comments</h5>
                </div>
                <div class="row m-2">
                    
                    @if ($comments->count() > 0)

                        @foreach ($comments as $comment)
                            <div class="row comment_header">
                                <a href="#" class="col align-self-start">{{ $comment->name }}</a>
                                <span class="col align-self-end text-end" >{{ $comment->created_at }}</span>
    
                            </div>
                            
                            <p>{{ $comment->content }}</p>

                        @endforeach
                    
                    @else

                        <p>No comments yet.</p>
                        
                    @endif
                </div>
                <div class="row m-2">
                    <div class="col-lg-12 m-auto">
                        <div class="card-footer pt-3"  style="border-top: 1px solid var(--bs-card-border-color)">
                            <h5>
                                Leave a comment
                            </h5>
                        </div>
                        <form id="comment" method="get" action="{{ route('comments.store') }}">
                      
                            <!-- Message input -->
                            <div class="form-outline mb-4">
                            <input type="text" name="content" class="form-control" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
    
                            <!-- Submit button -->
                            <button type="submit" value="comment" class="btn btn-primary main-button btn-block mb-4" style="padding: 1% 2%">Comment</button>
                        </form>
                    </div>
                    </div>   

            </div>
        </div>
     </div>
    </div>
</div>
@endsection
