@extends('layouts.app')

@section('content')
<div class="dashboard-bg"  style="background-color: #a5a4a423;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-header bg-light"> <h4>{{$msg}}</h4></div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Welcome back {{ Auth::user()->name }},</p>
                        <p>More updates will be visible soon!</p>

                    </div>
               
                </div>

            </div>
            <div class="col-md-8">
                <main class="">
                    @yield('dashboard_content')
                </main>
            </div>
        </div>
    </div>
</div>


@endsection
