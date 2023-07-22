@extends('layouts.app')

@section('content')
<div class="dashboard-bg"  style="background-color: #a5a4a423;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 ">
                <div class="card  mb-4 mb-lg-0">
                    <div class="card-header m-2 bg-light"> <h4>{{$msg}}</h4></div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="welcomeimg m-auto img-fluid"></div>
                        <p>Welcome back {{ Auth::user()->name }},</p>
                        <p>More updates will be visible soon!</p>
                        <p>Lorem, ipsum dolor.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <main class="">
                    @yield('dashboard_content1')
                </main>
            </div>
        </div>
        <main class="">
            @yield('dashboard_content2')
        </main>
    </div>
</div>


@endsection
