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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url("/") }}">
                    {{ config('app.name', 'Chakrichai') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    <ul class="navbar-nav m-auto col-lg-4">
                      <li class="nav-item">
                          <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Blog</a>
                      </li>
                    </ul>
                    @else
                      <form class="navbar-nav ms-auto col-lg-4 " method="GET" action="{{ url('search') }}">
                          @csrf
                              <div class="input-group">
                                <input type="text" name="search" value= "{{ Request::get('search') }}" class="form-control" style="border: None;" placeholder="Search User" aria-label="Search" aria-describedby="search-addon"/>
                                <button type="submit" class="border-0 btn" id="search-addon"><i class="fas fa-search" style="color: #eeaeca;"></i></button>
                              </div>
                      </form>
                      <ul class="navbar-nav justify-content-end col-lg-6">
                        @php
                              $userRoute = Auth::user()->role.'/home';

                        @endphp

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url($userRoute) }}">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('posts.index') }}">Job posts</a>
                        </li>
{{--
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('chatify') }}">Messages</a>
                        </li> --}}

                      </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest


                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('Settings') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>









        <main class="py-4">
            @yield('content')
        </main>
        <div class="row">
          <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
          </div>
        </div>

        <footer class="footer-bg text-center   bg-white">
            <!-- Section: Links  -->
            <section class= "footer">
              <div class="container-fluid text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4" >
                      <i class="fas fa-gem me-3 text-secondary"></i>Chakri Chai
                    </h6>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis, quod!
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4" >
                      Products
                    </h6>
                    <p>
                      <a href="#!" class="text-reset">Angular</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">React</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Laravel</a>
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Important links
                    </h6>
                    <p>
                      <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Help</a>
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3 text-secondary"></i> Dhaka, Bangladesh 1216</p>
                    <p>

                      <i class="fas fa-envelope me-3 text-secondary"></i>
                      chakrichai@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3 text-secondary"></i> + 88 01 253 236 114</p>
                    <p><i class="fas fa-print me-3 text-secondary"></i> + 88 01 012 141 785</p>
                  </div>
                  <!-- Grid column -->
                </div>
                <!-- Grid row -->
              </div>
          </section>
          <!-- Grid container -->

          </div>

          <section class="d-flex justify-content-center justify-content-lg-between p-4">

              <!-- Right -->
              <div class="container">
                  <div class="row">
                        <!-- left -->
                  <div class="col-lg-5 m-auto text-dark">
                      <span>Get connected with us on social networks:</span>
                  </div>
                  <!-- Section: Social media -->
                  <div class="col-lg 6 ml-auto">
                      <!-- Facebook -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="fab fa-facebook-f"></i>
                      </a>

                      <!-- Twitter -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                      <i class="fab fa-twitter"></i>
                      </a>

                      <!-- Google -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="fab fa-google"></i>
                      </a>

                      <!-- Instagram -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="fab fa-instagram"></i>
                      </a>

                      <!-- Linkedin -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button"><i class="fab fa-linkedin"></i>
                      </a>
                      <!-- Github -->
                      <a class="btn btn-link btn-floating btn-lg" href="#!" role="button">
                          <i class="fab fa-github"></i>
                      </a>
                  </div>
                <!-- Section: Social media -->

                  </div>
              <!-- Right -->
            </section>
            <!-- Section: Social media -->

          <!-- Copyright -->
          <div class="text-center text-dark pt-3 pb-3 border-top">
              <h6 class="copyright-text">©2023 ChakriChai</h6>
          </div>
          <!-- Copyright -->
        </footer>

        <!--FOOTER PART END-->

    </div>

</body>
</html>
