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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    
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
                            href="/restaurants"> Restaurants </a>
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

        <main class="py-4">
        <b>{{$restaurant->name}}</b><br>
        <b>Address:</b>
        {{$restaurant->address}}<br>

        <b>Township:</b>{{$restaurant->township->name}}<br>
        <b>Available Food_category:</b>{{$restaurant->food_category->name}}<br>
        <b>Deliver Hour:</b><i>{{$restaurant->delivery_hour}}</i><br>
        <b>Contact :</b> <i>{{$restaurant->phone}}</i>
        <p>
            Meal Type :
        
                @foreach ($meal_types as $meal_type)
                    {{$meal_type->name}}
                @endforeach
          
        </p>
        <hr>
        
        <form action="{{route('menus.create')}}" method="POST">
            @csrf
            @method('GET')
            <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
            <b>Main Menu</b>
            <button class="btn btn-success" style="float: right">Create Menu</button>
            <br>
            @foreach($menus as $menu)
            <a href="" >{{$menu->menu_type->name}}</a>
            @endforeach
            </ul>
        </form>
        <hr>
        <ul style="list-style: none">
            @forelse ($menus as $menu)
               <b>{{$menu->menu_type->name}}</b>
                 <li>
                    <div class="small mt-2"> 
                        <b>{{$menu->name}}</b>
                        [<a href="{{route('menus.edit', $menu->id)}}">Edit</a>]
                        {{-- [<a href="{{ action('menu.delete', $menu->id) }}">Delete</a>] --}}
                        <p>1pcs</p>
                        <p>MMK {{$menu->price}}</p>
                    </div>
                    <hr>
                  </li>
            @empty
            @endforelse
            </ul>  
        </main>
    </div>
</body>
</html>
            
