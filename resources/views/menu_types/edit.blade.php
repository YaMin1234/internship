<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Food Delivery'}}</title>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   

</head>
<style>
    img.avatar1 {
            width: 3%;
            border-radius: 50%;
               }
    #nav{
        height: 15px;
    }
    .shadow
   {
    box-shadow:5px 10px 18px #888888;
    width:800px;
    background-color:white;
   
   }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="nav">
                <img src="{{ URL::asset('/photos/'. 'logo3.jpg') }}" alt="Avatar" class="avatar1">
                <a class="navbar-brand" href="{{ url('/') }}"  style="color:#EF895D;">
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
                        <a class="nav-link"  style="color:#EF895D;" href="{{route('users.edit',Auth::user()->id)}}">
                            Update Profile
                         </a>
                         @endauth
                        </li>
                        <li class="nav-item">
                            @auth
                            <div class="dropdown">
                                <button class="btn btn-succress dropdown-toggle" type="button" data-toggle="dropdown">Restaurant
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a class="nav-link"  style="color:#EF895D;"
                                    href="{{route('restaurants.create')}}">Create Restaurant </a></li>
                                  <li><a class="nav-link"  style="color:#EF895D;"
                                    href="{{route('resaturants.trashed')}}">Restore Restaurants</a></li>
                                  <li><a class="nav-link"  style="color:#EF895D;"
                                    href="{{route('restaurants')}}">Restaurants</a></li>
                                </ul>
                              </div>
                            @endauth
                        </li>
                        <li class="nav-item">
                                @auth
                                <a class="nav-link"  style="color:#EF895D;"
                                href="/menu_types">Menu Types</a>
                                @endauth
                           </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link"  style="color:#EF895D;"
                            href="/manage-order">Manage Orders</a>
                            @endauth
                       </li>
                       <li class="nav-item">
                        @auth
                        <a class="nav-link"  style="color:#EF895D;"
                        href="/all-message">Messages</a>
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
                                    <a class="nav-link" href="/users/register">{{ __('Register') }}</a>
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

        <main class="py-4"> 
            <div class="container">
                @if($errors->any())
                   <div class="alert alert-warning">
                       <ol>
                           @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                           @endforeach
                       </ol>
                    </div>
                   @endif
            </div>
           <div class="container shadow">
            <form action="{{ route('menu_types.update',$menu_type->id)}}" method="POST">
               
                @csrf
                @method('PATCH')
                
                <h3 style="padding-left:200px;color:#EF895D;"> Create Menu_type</h3>
                <hr>
                <div class=" container form-group">
                    <label>Menu Type Name</label>
                    <input type="text" name="name" class="form-control col-md-5" value="{{$menu_type->name}}">
                </div>
               
                <div style="padding-left:200px;">
                    <button class="btn btn-outline-info col-md-4">Update Menu Type</button>
                </div>
                <br>
            </form>
           </div>
        </main>
    </div>
</body>
</html>

   