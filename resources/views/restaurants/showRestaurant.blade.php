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
    padding-left: 10px;
    padding-right: 10px;
}
#overlay {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 2000%;
background: #000;
opacity: 0.2;
display: none;
}
#dialog {
position: absolute;
top: 70%;
left: 35%;
width: 30%;
border: 4px solid #ccc;
background: #fff;
display: none;
}
#dialog h2 {
margin: 0;
padding: 8px;
background: #ddd;
font-size: 17px;
}
#dialog h2 span {
display: block;
float: right;
padding: 0 5px;
color: #c22;
cursor: pointer;
}
#dialog form { 
padding: 20px;
}
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

        <main class="py-4"> 
           
            <div class="container page">
            <div class="card">
                <div class="card-img-top">
                <img  src="{{ URL::asset('/photos/'. $restaurant->photos) }}" alt="Card image cap" width="1110">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="cursor:pointer;" onclick="showDialog()">{{$restaurant->name}}</h5>
                    <div id="overlay" onClick="hideDialog()"></div>
                    <div id="dialog">
                        <h2>{{$restaurant->name}}<span onClick="hideDialog()">&times;</span></h2>
                        <form>
                        <p class="card-text"> <b>Address:</b>
                        {{$restaurant->address}}<br>
            
                        <b>Township:</b>{{$restaurant->township->name}}<br>
                        <b>Available Food_category:</b>{{$restaurant->food_category->name}}<br>
                        <b>Deliver Hour:</b><i>{{$restaurant->delivery_hour}}</i><br>
                        <b>Contact :</b> <i>{{$restaurant->phone}}</i><br>
                        <b> Meal Type :</b><i>
                        
                                @foreach ($meal_types as $meal_type)
                                    {{$meal_type->name}}
                                    @if( !$loop->last)
                                    ,
                                @endif
                                @endforeach
                        </i>
                   </p>
                        </form>
                    </div>
                </div>
              </div>
                
                
        
        <form action="{{route('menu_types.create')}}" method="POST">
            @csrf
            @method('GET')
            <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
            <b>Main Menu</b>
            <button class="btn btn-outline-info col-md-2" style="float: right">Create Menu Type</button>
        </form>
        
           
            @foreach($menu_types as $menu_type)
              <a href="{{route('menu_types.show', $menu_type->id)}}" style="text-decoration: none;color:#EF895D" class="menuType" >{{$menu_type->name}}</a>
            @endforeach
            <hr>
       
       
        <ul style="list-style: none">
            @forelse ($menu_types as $menu_type)
               <b  style="color:#EF895D" >{{$menu_type->name}}</b>
                 <li>
                    <div class="row"> 
                          @foreach($menu_type->menu as $menu)
                        <div class="col-sm-6">
                           
                          <h6>{{$menu->name}}</h6>
                          <img  src="{{ URL::asset('/photos/'. $menu->photos) }}" alt="Card image cap" style="height:50px;display:block;">
                         
                          [<a href="{{route('menus.edit', $menu->id)}}" style="text-decoration: none">Edit</a>]
                          [<a href="{{route('menus.delete', $menu->id) }}" style="text-decoration: none" class="text text-danger">Delete</a>] 
                          <p>1pcs</p>
                          <p>MMK {{$menu->price}}</p>
                         
                        </div>
                        @endforeach
                        <form action="{{route('menus.create')}}" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="restaurant_id" value="{{$menu_type->restaurant->id}}">
                            <input type="hidden" name="menuType_id" value="{{$menu_type->id}}">
                            <button class="btn btn-outline-info col-md-12">Create Menu</button>
                        </form>
                    </div>
                    
                  </li> 
                  <hr>
            @empty
            @endforelse
            </ul> 
            </div>     
        </main>
    </div>
    
    

    <script>
    function showDialog() {
      document.getElementById("overlay").style.display = "block";
      document.getElementById("dialog").style.display = "block";
    }
    function hideDialog() {
      document.getElementById("overlay").style.display = "none";
      document.getElementById("dialog").style.display = "none";
    }
    </script>
   
</body>
</html>
            
