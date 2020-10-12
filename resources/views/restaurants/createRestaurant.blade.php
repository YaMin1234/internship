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
                        <a class="nav-link" style="color: #EF895D" href="{{route('users.edit',Auth::user()->id)}}">
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
                                  <li><a class="nav-link"
                                    href="{{route('restaurants.create')}}"  style="color: #EF895D">Create Restaurant </a></li>
                                  <li><a class="nav-link"
                                    href="{{route('resaturants.trashed')}}"  style="color: #EF895D">Restore Restaurants</a></li>
                                  <li><a class="nav-link"
                                    href="{{route('restaurants')}}"  style="color: #EF895D">Restaurants</a></li>
                                </ul>
                              </div>
                            @endauth
                        </li>
                        <li class="nav-item">
                                @auth
                                <a class="nav-link"
                                href="/menu_types"  style="color: #EF895D">Menu Types</a>
                                @endauth
                           </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link"
                            href="/manage-order"  style="color: #EF895D">Manage Orders</a>
                            @endauth
                       </li>
                       <li class="nav-item">
                        @auth
                        <a class="nav-link "
                        href="/all-message"  style="color: #EF895D">Messages</a>
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
            
            <form action="{{ route('restaurants.store')}}" method="POST" enctype="multipart/form-data">
            
                    @csrf
                    <h3 style="padding-left:200px;color:#EF895D;"> Create Restaurant</h3>
                    <hr>
                    <div class="form-row">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    
                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">Restaurant Name</label>
                    <input type="text" name="name" class="form-control col-md-5" placeholder="Restaurant Name">
                    </div>

                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">Restaurant Cover</label><br>
                    <input type="file" name="photos" >
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">City</label>
                    <select class="form-control col-md-5" name="township_id">
                    <option>Choose....</option>
                    @foreach($townships as $township)
                    <option value="{{ $township->id }}">
                    {{ $township->name }}{{","}} {{$township->postal_code}}
                    </option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">Address</label>
                    <input type="text" name="address" placeholder="Unit, Street Name" class="form-control col-md-5">
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">Food_Category</label>
                    <select class="form-control col-md-5" name="food_category_id">
                    <option>Choose....</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                    {{ $category->name }}
                    </option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">Meal Types</label><br>
                    @foreach($meals as $meal)
                    <input type="checkbox" name="meal_type_id[]" value="{{ $meal->id}}">{{$meal->name}}
                    
                    @endforeach
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">Deliver Hour</label><br>
                    <input type="text" name="delivery_hour" placeholder="Deliver Days and Hour" class="form-control col-md-5">
                    </div>
                    <div class="form-group col-md-6">
                    <label style="color: #EF895D;">Phone Number</label>
                    <input type="text" name="phone" placeholder="Your Phone Number" class="form-control col-md-5">
                    </div>
                    </div>
                    
                    <div style="padding-left:200px;">
                    <button class="btn btn-outline-info col-md-4">Create Restaurant</button>
                    </div>
                    <br>
            </form>
            </div>
            </main>

</div>

</body>
</html>
     
   