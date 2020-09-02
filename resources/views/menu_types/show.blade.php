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
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a.menuType:hover{
         color:brown;
            }
           
      img.avatar1 {
              width: 3%;
              border-radius: 50%;
                 }
        #nav{
        height: 15px;
    }
  </style>
   
  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" id="nav">
                <img src="{{ URL::asset('/photos/'. 'logo3.jpg') }}" alt="Avatar" class="avatar1">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:pink">
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
                        <a class="nav-link text-success" href="{{route('users.edit',Auth::user()->id)}}">
                            Update Profile
                         </a>
                         @endauth
                        </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link text-success"
                            href="/restaurants"> Restaurants </a>
                            @endauth 
                            </li>
                            <li class="nav-item">
                                @auth
                                <a class="nav-link text-success"
                                href="/menu_types">Menu Types</a>
                                @endauth
                           </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link text-success"
                            href="/orders">Manage Orders</a>
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
            <div class="card">
                <div class="card-img-top">
                <img  src="{{ URL::asset('/photos/'. $restaurant->photos) }}" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$restaurant->name}}</h5>
                    <p class="card-text"> <b>Address:</b>
                        {{$restaurant->address}}<br>
            
                        <b>Township:</b>{{$restaurant->township->name}}<br>
                        <b>Available Food_category:</b>{{$restaurant->food_category->name}}<br>
                        <b>Deliver Hour:</b><i>{{$restaurant->delivery_hour}}</i><br>
                        <b>Contact :</b> <i>{{$restaurant->phone}}</i><br>
                        <b> Meal Type :</b><i>
                        
                                @foreach ($meal_types as $meal_type)
                                    {{$meal_type->name}}
                                @endforeach
                        </i>
                   </p>
                </div>
              </div>
         
      
        
        <form action="{{route('restaurants.show',$restaurant->id)}}" method="POST">
            @csrf
            @method('GET')
            {{-- <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}"> --}}
            <b>Main Menu</b>
            <button class="btn btn-primary" style="float: right">Back</button>
        </form>
        
           
            @foreach($menu_types as $menu_type)
              <a href="{{route('menu_types.show', $menu_type->id)}}" style="text-decoration: none" class="menuType" >{{$menu_type->name}}</a>
            @endforeach
            <hr>
       
       
        <ul style="list-style: none">
            @forelse ($menu_types as $menu_type)
               <b>{{$menu_type->name}}</b>
                 <li>
                    <div class="small mt-2"> 
                          @foreach($menu_type->menu as $menu)
                        <div class="container">
                            {{-- <img  src="{{ URL::asset('/photos/'. $menu->photos) }}" alt="Card image cap" > --}}
                         
                          <b>{{$menu->name}}</b>
                          
                          [<a href="{{route('menus.edit', $menu->id)}}" style="text-decoration: none">Edit</a>]
                          [<a href="{{route('menus.delete', $menu->id) }}" style="text-decoration: none" class="text text-danger" >Delete</a>] 
                          <p>1pcs</p>
                          <p>MMK {{$menu->price}}</p>
                         
                        </div>
                        @endforeach
                        <form action="{{route('menus.create')}}" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="restaurant_id" value="{{$menu_type->restaurant->id}}">
                            <input type="hidden" name="menuType_id" value="{{$menu_type->id}}">
                            <button class="btn btn-success">Create Menus</button>
                        </form>
                    </div>
                    
                  </li> 
                  <hr>
            @empty
            @endforelse
            </ul>  
        </main>
    </div>
</body>
</html>
            
