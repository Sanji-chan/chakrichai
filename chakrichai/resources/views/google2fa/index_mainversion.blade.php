<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Chakrichai') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


</head>
<body class="d-flex flex-column  bg-white min-vh-200">
    <div id="app">
        <div class="container">
            <div class="row justify-content-center align-items-center " style="height: 70vh;S">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading font-weight-bold">Register</div>
                        <hr>
                        @if($errors->any())
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                  <strong>{{$errors->first()}}</strong>
                                </div>
                            </div>
                        @endif
          
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                                {{ csrf_field() }}
          
                                <div class="form-group">
                                    <p>Please enter the  <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
                                    <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>
          
                                    <div class="col-md-6">
                                        <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
                                    </div>
                                </div>
          
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4 mt-3">
                                        <button type="submit"  class="btn btn-primary secondary-button" style="background: #eeaeca; border: 1px solid #eeaeca; color: #fff;">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
    </div>
 
</body>
</html>
