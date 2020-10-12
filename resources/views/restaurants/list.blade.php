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
  main{
      padding-left:10px;
      padding-right: 10px;
      
  }
  .top-buffer { margin-top:20px; }

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="nav">
                <img src="{{ URL::asset('/photos/'. 'logo3.jpg') }}" alt="Avatar" class="avatar1">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#EF895D">
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
                        <a class="nav-link" style="color:#EF895D" href="{{route('users.edit',Auth::user()->id)}}">
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
                                  <li><a class="nav-link" style="color:#EF895D"
                                    href="{{route('restaurants.create')}}">Create Restaurant </a></li>
                                  <li><a class="nav-link" style="color:#EF895D"
                                    href="{{route('resaturants.trashed')}}">Restore Restaurants</a></li>
                                  <li><a class="nav-link" style="color:#EF895D"
                                    href="{{route('restaurants')}}">Restaurants</a></li>
                                </ul>
                              </div>
                            @endauth
                        </li>
                        <li class="nav-item">
                                @auth
                                <a class="nav-link" style="color:#EF895D"
                                href="/menu_types">Menu Types</a>
                                @endauth
                           </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link" style="color:#EF895D"
                            href="/manage-order">Manage Orders</a>
                            @endauth
                       </li>
                       <li class="nav-item">
                        @auth
                        <a class="nav-link" style="color:#EF895D"
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

        <main  class="py-4">    
                <div class="row  top-buffer"  >
                    <div class="card-group">
                     @forelse ($restaurants as $restaurant)
                     <div class="col-sm-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ URL::asset('/photos/'. $restaurant->photos) }}" alt="Card image cap" height="150">
                                   <div class="card-body">
                                       <h5 class="card-title"><a href="{{route('restaurants.show', $restaurant->id)}}" style="text-decoration: none;color:#EF895D;"> {{$restaurant->name}}</a></h5>
                                          {{-- <p class="card-text"> 
                                        {{-- by<b>{{$restaurant->user->name}}</b> --}}
                                            {{-- {{$restaurant->created_at->diffForHumans() }}</p>
                                          <p class="card-text">
                                            Available Food category:{{$restaurant->food_category->name}}</p> --}}
                                    </div>
                                        <div class="card-footer">
                                            <div class="row" style="padding-left:30px;">
                                               <a href="{{route('restaurants.edit', $restaurant->id)}}" ><i class="fa fa-edit" style="color:#EF895D"></i></a>&nbsp;&nbsp;&nbsp;
                                               
                                                <a href="{{route('resaturants.hdelete', $restaurant->id)}}" ><i class="fa fa-trash" aria-hidden="true" style="color:#EF895D"></i></a> 
                                            </div> 
                                        </div>
                                    </div>
                     </div>
                     @empty    
                     @endforelse
                      
               
                 </div> 
           
       </div>
        
              
</main>
</div>
</body>
</html>


    