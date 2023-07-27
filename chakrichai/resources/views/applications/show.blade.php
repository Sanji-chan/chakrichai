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
                        <form action="#" method="POST">
                            @csrf
                            <button type="submit"  class="btn btn-primary secondary-button">Change status</button>
                        </form>
                    @endif
                </div>
               
                </div>
            </div>
</div>
@endsection
