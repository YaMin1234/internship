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
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            @auth
                            <a class="nav-link text-success"
                        href="/restaurants">&lt;&lt;Back </a>
                            @endauth
                            </li>
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
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                    <th class="text-center">Menu Types Name</th>
                    <th class="text-center">Restaurants Name</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($menu_types as $menu_type)
                    <tr>
                    <td class="text-center">{{$menu_type->name}}
                        <div class="small mt-2">
                            {{ $menu_type->created_at->diffForHumans() }}
                         </div> 
                     </td>
                        <td class="text-center">{{$menu_type->restaurant->name}}</td>
                       
                        <td>
                            <a class="btn btn-primary" href="{{route('menu_types.edit', $menu_type->id)}}" style="text-decoration: none;">Edit</a>
                            <a class="btn btn-danger" href="{{route('menu_types.delete', $menu_type->id) }}" style="text-decoration: none;">Delete</a>
                            <form action="{{route('menus.create')}}" method="POST">
                                @csrf
                                @method('GET')
                                <input type="hidden" name="restaurant_id" value="{{$menu_type->restaurant->id}}">
                                
                                <button class="btn btn-success">Create Menus</button>
                            </form>
                        </td>
                    </tr>
                    @empty    
                    @endforelse 
                    
                </tbody>
            </table>     
              
</main>
</div>
</body>
</html>


    