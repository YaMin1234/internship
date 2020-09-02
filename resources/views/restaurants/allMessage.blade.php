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
   

</head>
<style>
    img.avatar1 {
            width: 3%;
            border-radius: 50%;
               }
    #nav{
        height: 15px;
    }

</style>
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
                        href="{{route('restaurants.create')}}">Create Restaurant </a>
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
                            href="/manage-order">Manage Orders</a>
                            @endauth
                       </li>
                       <li class="nav-item">
                        @auth
                        <a class="nav-link text-success"
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
<main>
          <p class="alert-success">
			<?php
			$message=session()->get('message');
			if($message)
			{
				echo $message;
				session()->put('message',null);

			}
           ?>
		</p>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						  <tr>
						  	  <th>Contact ID</th>
							  <th>First Name</th>
							  <th>Last Name</th>
							  <th>Email</th>
							  <th>Body</th>
							  <th>Actions</th>
						  </tr>
					  </thead> 
                 @foreach( $all_message_info as $message)
					  <tbody>
						<tr>
						<td>{{ $message->contact_id }}</td>
						<td class="center">{{ $message->first_name }}</td>
						<td class="center">{{ $message->last_name }}</td>
						<td class="center">{{ $message->email }}</td>
						<td class="center">{{$message->body}}</td>

						<td class="center">
							@if($message->publication_status==1)
							<span class="label label-success">Unseen</span>
							@else
                                <span class="label label-danger">Seen</span>
							@endif
						</td>

						<td class="center">
                            @if($message->publication_status==1)
							<a class="btn btn-danger" href="{{route('unactive_contact',$message->contact_id)}}">
								<i class="halflings-icon white thumbs-down"></i>  
							</a>
                            @else
                             <a class="btn btn-success" href="{{route('active_contact',$message->contact_id)}}">
								<i class="halflings-icon white thumbs-up"></i>  
							</a>
                            @endif

							<a class="btn btn-info" href="{{route('view_message',$message->contact_id)}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{route('delete_contact',$message->contact_id)}}" id="delete">
								<i class="halflings-icon white trash"></i> 
							</a> 
						</td>
						</tr>				
					  </tbody>
                   @endforeach
				  </table>            
				</div>
			</div><!--/span-->
		
		</div><!--/row-->

	</main>
</div>
</body>
</html>