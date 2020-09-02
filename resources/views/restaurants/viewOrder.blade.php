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
	<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details </h2>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <th>customer name</th>
									  <th>mobile</th>                                       
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									 @foreach($order_by_id as $v_order)
									 @endforeach 
							         <td>{{$v_order->customer_name}}</td>
							         <td>{{$v_order->mobile_number}}</td> 
							                                  
								</tr>                                
							  </tbody>
						 </table>      
					</div>
				</div>
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Address</th>
									  <th>Mobile</th> 
									   <th>Email</th>           
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									@foreach($order_by_id as $v_order)
									 @endforeach
								      <td>{{$v_order->shipping_name}}</td>
								      <td>{{$v_order->shipping_address}}</td>                   
								      <td>{{$v_order->shipping_mobile_number}}</td>
								      <td>{{$v_order->shipping_email}}</td>   
								     
								</tr>
							                                 
							  </tbody>
						 </table>    
					</div>
				</div><!--/span-->
			</div><!--/row-->
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped ">
						  <thead>
							  <tr>
								  <th>Order Id</th>
								  <th>Menu name</th>
								  <th>Menu price</th>
								  <th>Menu sales quantity</th>
								  <th>Menu sub total</th>
							  </tr>
						  </thead> 

						  <tbody>
						 @foreach($order_by_id as $order)							  	 
							<tr>
						
				             <td>{{$order->order_id}}</td> 
				             <td>{{$order->menu_name}}</td> 
				             <td>{{$order->menu_price}}</td>
				             <td>{{$order->menu_sales_quantity}}</td> 
                             <td>{{$order->menu_price*$order->menu_sales_quantity}}</td>
				                
                              
							</tr>
						@endforeach
							
						  </tbody>
                          <tfoot>
                          	<tr>
                          	<td colspan="4">Total with vat: </td>
                          	<td><strong>={{$order->order_total}}  MMK</strong></td>
                          	</tr>
                          </tfoot>
				               
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		

        </main>
    </div>
    </body>
    </html>