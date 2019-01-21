<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ME2U @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            @yield('theme')
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ME2U') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
        
                    </ul>
                   
                    <!-- Right Side Of Navbar -->
                    
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                      
                              <li class="nav-item">
                                  <a href="{{url('/Users')}}" class="nav-link text-light">All User</a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{url('/friend')}}" class="nav-link text-light">Friends</a>
                              </li>
                              <li class="nav-item">
                                    <a href="{{url('/messaging')}}" class="nav-link text-light">Inbox
                                        <span class="badge badge-light"> @yield('inbox_count')</span> 
                                    </a>
                                </li>
                              <li class="nav-item">
                                    <a href="{{url('/Sent')}}" class="nav-link text-light">Sent Messages
                                    </a>
                                </li>
                                <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('Search.store')}}">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
                                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      </form> &nbsp;  &nbsp;
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <span class="text-white">{{ Auth::user()->name }}</span> <span class="caret"></span>
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{url('/profile')}}" class="dropdown-item">Profile</a>
                                        <a href="/settings/{{Auth::user()->id}}/edit" class="dropdown-item">Settings</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
    </div>
</body>
</html>
