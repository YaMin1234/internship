<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {
            margin-left: 250px;
        }
        
      button:hover {
                   opacity: 0.8;
                         }
       main {
                 background-color: rgba(126, 123, 215, 0.2);
            }
             .cancelbtn {
                 width: auto;
                 padding: 10px 20px;
                 background-color: #f44336;
                       }
             .imgcontainer {
                
                  margin-right: 50px ; 
                  padding-right: 50px;
                 }

             img.avatar {
                 width: 15%;
                 border-radius: 50%;
                 }
             span.psw {
                 float: right;
                 padding-top: 16px;
                 }
                 .container 
                 {
                   padding: 5px;
                }         
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                Food Delivery
                </a>
                <button class="navbar-toggler" type="button" data-toggleis="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            @auth
                            <a class="nav-link text-success"
                            href=""></a>
                            @endauth
                            </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/users/login">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/users/registeration">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/logout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                        @csrf
                                        @method('GET')
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="text-justify">
        
        <form class="pure-form pure-form-stacked" action="/users/login"  method="post">
          @csrf
          <div class="imgcontainer">
             <img src="{{ URL::asset('/photos/'. 'logo.jpg') }}" alt="Avatar" class="avatar">
          </div>
       
          <div class = "container form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control col-md-5" placeholder="Enter Email" required>
         </div>
         <div class = "container form-group">
            <label for="password">Password</label>
            <input type="password" minlength="8" name="password" class="form-control col-md-5" required>
         </div>

         <div class="form-group">
            <button class="btn btn-outline-info col-md-3" type="submit" name="login">Login</button>
        </div>
          <p>Don't have an account yet? <a href="/users/registeration">Register here</a></p>
        </form>
        
        </main>
    </div>
</body>
</html>