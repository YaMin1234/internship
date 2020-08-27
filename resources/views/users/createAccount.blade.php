<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Food Delivery') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>

.view {
  height: 100%;
}

@media (max-width: 740px) {
  
  .view {
    height: 1000px;
  }
}
@media (min-width: 800px) and (max-width: 850px) {
 
  .view {
    height: 1000px;
  }
}


/* .rgba-gradient {
  background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
  background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
  background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
} */

.card,input[type="text"],input[type="email"],input[type="password"] {
  background-color: rgba(126, 123, 215, 0.2);
}

.md-form label {
  color: #ffffff;
}
p{
  color: #ffffff;
}
.card-body{
  align: center;
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
                                <a class="dropdown-item" href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getEledmentById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
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
      

        <div class="view" style="background-image:url('/photos/register.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
                
           <form class="pure-form pure-form-stacked" action="/users/register" method="post">
                    @csrf
                

                  <div class="mask rgba-gradient align-items-center">
                  
                    <div class="container">
                     
                      <div class="row mt-15">
                        
                        <div class="col-md-6 col-xl-5 mb-4">
                          <!--Form-->
                          <div class="card wow fadeInRight">

                            <div class="card-body">
                       
                              <div class="text-center">
                                <h3 class="text text-white">
                                  <i class="fa fa-user text text-white"></i> Register</h3>
                                <hr class="hr-light">
                              </div>
                             
                              <div class="md-form">
                                <i class="fa fa-user prefix  active text text-white"></i>
                                <input type="text"  class=" form-control" name="name">
                                <label for="form3" class="active">Your name</label>
                              </div>

                              <div class="md-form">
                                <i class="fa fa-envelope prefix active text text-white "></i>
                                <input type="email"  class=" form-control" name="email">
                                <label for="form2" class="active">Your email</label>
                              </div>

                              <div class="md-form">
                                <i class="fa fa-lock prefix active  text text-white"></i>
                                <input type="password"  class=" form-control" name="password">
                                <label for="form4">Your password</label>
                              </div>

                              <div class="text-center mt-4">

                                <button class="btn btn-primary">Sign up</button>
                                <p >Already have Account?<a href="/users/login" class="text-success" style="text-decoration: none;">Sign In...</a></p>
                                <hr class="hr-light mb-3 mt-4">
                              
                                <div class="inline-ul text-center">
                                    <a class="p-2 m-2 tw-ic">
                                      <i class="fa fa-twitter text text-white"></i>
                                    </a>
                                    <a class="p-2 m-2 li-ic">
                                      <i class="fa fa-linkedin text text-white"> </i>
                                    </a>
                                    <a class="p-2 m-2 ins-ic">
                                      <i class="fa fa-instagram text text-white"> </i>
                                    </a>
                                </div>

                              </div>

                            </div>

                          </div>
                        
                        </div>
                        
                      </div>
                    
                    </div>
                 
                  </div>
                 
                </form>
              </div>
        
 </div>

</body>
</html>