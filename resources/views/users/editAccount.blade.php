
  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
  
      <title>{{'Food Delivery'}}</title>

  
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
  
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <style>
      img.avatar1 {
              width: 3%;
              border-radius: 50%;
                 }
      #nav{
          height:15px;
      }
  </style>
  <body>
      <div id="app">
          <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
              <div class="container" id="nav">
                <img src="{{ URL::asset('/photos/'. 'logo3.jpg') }}" alt="Avatar" class="avatar1">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:pink">
                   <b> Food Delivery </b>
                </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                  <a class="nav-link" href="users/login">{{ __('Login') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="users/register">{{ __('Register') }}</a>
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
                                       
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>
  
          <main>
           
            <form action="{{ route('users.update',$user->id)}}" method="POST">

              @csrf
              @method('patch')
              <div class="container form-group">
                 <h5>Update your profile.</h5>
              </div>
              <div class="container form-group">
              <label for="name">Name</label>
              <input type="text" name="name" value="{{$user->name}}" class="form-control col-md-5">
              </div>
           
              <div class="container form-group">
              <label for="email">Email Address</label>
               <input type="email" name="email" value="{{$user->email}}" class="form-control col-md-5">
              </div>
          
             <div class="container form-group">
              <label for="password">Password</label>
              <input type="password" minlength="8" name="password" value="{{$user->password}}" class="form-control col-md-5">
             </div>
            
             
             <div class="container form-group">
                <button class="btn btn-info">Update Profile</button>
            </div>
            </form>
          
          </main>
      </div>
  </body>
  </html>
  
  