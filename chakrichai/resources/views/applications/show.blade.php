@extends('layouts.app')


@section('content')
<div class="post-bg" style="background-color: #a5a4a423;">
    <div class="container">

        <div class="row mt-4">
            <div class="col-lg-8 m-auto">

                <div class="card mb-lg-0">
                    <div class="card-header m-2">
                        <h4>{{ $application->name }} Applied to "{{  $post->title }}"</h4>
                        <p class="text-muted mb-0" style="font-size: 14px">Applied at {{ $application->created_at }}</p>

                        {{-- <span>Applied at {{ $application->created_at }}</span> --}}
                    </div>

                    <div class="card-body form-group col justify-content-center ">
                        <div class="row">
                        <p>Age: {{ $application->age }}</p>
                        <p>University: {{ $application->Uni_name}}</p>
                        <p>Major: {{ $application->major }}</p>
                        <p>Semester: {{ $application->semester }}</p>
                        <p>Resume: <a href="{{route('applications.getresume', $application->resume) }}" target="_blank"  rel="noopener" method="GET">{{ $application->resume }}</a></p>


                        <p>Application status: {{ $application->status }}</p>
                        @if (Auth::user()->role == 'buyer')
                            <form action="{{ route('buyer.home') }}" method="GET">
                                @csrf
                                <button type="submit"  class="btn btn-primary secondary-button">Change status</button>
                            </form>
                        @endif
                    </div>

                    </div>
                </div>
            </div>
        </div>

        @if((auth()->user()->role == 'buyer' || auth()->user()->role == 'seller') && $application->status == 'Accepted' && $post->status == 'completed')

        <div class="row mt-4">
            <div class="col-lg-8 m-auto">

                <div class="card mb-lg-0">
                    <div class="card-header m-2">
                        @if(auth()->user()->role == 'buyer')

                            <h4>Rate Seller</h4>

                        @elseif(auth()->user()->role == 'seller')
                            <h4>Rate Buyer</h4>
                        @endif
                    </div>

                    <div class="card-body form-group col justify-content-center ">
                        <div class="row">

                            @if(auth()->user()->role == 'buyer' && $post->buyer_rating)
                                <h5>You already rated the seller.</h5>
                            @elseif(auth()->user()->role == 'seller' && $post->seller_rating)
                                <h5>You already rated the buyer.</h5>
                            @else
                                <form action="{{ route('rating') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Use the slider to rate</label>
                                        <br>
                                        <div class="d-flex mt-1">
                                            <input name="rating" style="margin-right: 10px" type="range" min="1" max="10" value="5" class="form-control form-range" oninput="this.nextElementSibling.value = this.value">
                                            <output class="h5">5</output>
                                            <h5 class="text-nowrap">&nbsp;out of 10</h5>
                                        </div>
                                    </div>

                                    <br>

                                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                                    @if(auth()->user()->role == 'buyer')
                                        <input type="hidden" name="user_id" value="{{ $application->user_id }}">
                                    @elseif(auth()->user()->role == 'seller')
                                        <input type="hidden" name="user_id" value="{{ $post->user_id }}" >
                                    @endif

                                    <button type="submit"  class="btn btn-primary secondary-button m-auto d-flex">Submit</button>
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endif

    </div>
</div>

@endsection
