<!DOCTYPE html>
<html>
<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
    <title>Food Delivery</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 
</head>
<style>
    .shadow{
      max-height: 100px;
      box-shadow:5px 10px 18px #888888;
      width:400px;
      height:200px;
    }
    
  .container1 {
  position: relative;
  width: 100%;
  max-width: 400px;
  left:330px;
  display:inline-block;
  bottom:70px;
}

.container1 img {
  width: 60px;
  height: 55px;
}

.container1 .btn {
  position: absolute;
  top: 60%;
  left: 12%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  color: white;
  font-size: 10px;
  padding: 6px 10px;
  cursor: pointer;
  text-align: center;
}

.container1 .btn:hover {
 font-size: 13px;
}
.menuType:hover{
    color:orange;
}
.menuName:hover{
    color:orange;
}
  </style>
<body>
 
    <div class=" bg-light" style="height:45px;">
 
        <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-warning" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
 
                        <?php $total = 0 ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach
 
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">MMK {{ $total }}</span></p>
                        </div>
                    </div>
 
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{   URL::asset('/photos/'. $details['photo']) }}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> MMK{{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('foodDelivery.cart') }}" class="btn btn-warning btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<div class="container page">
 
    <main class="py-4">
        <div class="card">
            <div class="card-img-top">
            <img  src="{{ URL::asset('/photos/'. $restaurant->photos) }}" alt="Card image cap"  width="1110">
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
          <div>
            <form action="{{route('foodDelivery.show',$restaurant->id)}}" method="POST">
                @csrf
                @method('GET')
                <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                <b>Main Menu</b>
                <button class="btn btn-warning" style="float: right"><i class="fa fa-backward" aria-hidden="true"></i></button>
            </form>
           
          </div>
          @foreach($menu_types as $menu_type)
          <a href="{{route('foodDelivery.showMenu', $menu_type->id)}}" style="text-decoration: none" class="menuType" >{{$menu_type->name}}</a>
        @endforeach
        <hr>
   
          {{-- <form action="" method="post"> --}}
          <ul style="list-style: none">
            @forelse ($menu_types as $menu_type)
               <h6>{{$menu_type->name}}</h6>
               

                 <li>
                    <div class="row"> 
                        @foreach($menu_type->menu as $menu)
                       
                          <div class="col-sm-6">
                            <div class="shadow" >
                               
                              <a href="{{ route('foodDelivery.addToCart',$menu->id) }}" style="font-size: 13px;padding-left:20px;text-decoration:none;font-weight:bold;" class="menuName">{{$menu->name}}</a> 
                                <p style="font-size: 11px;padding-left:20px;">1pcs</p>
                                <p style="font-size: 12px;padding-left:20px;">MMK {{$menu->price}}</p>
                               
                            <div class="container1">
                                <img  src="{{ URL::asset('/photos/'. $menu->photos) }}" alt="Card image cap" > 
                                <a href="{{ route('foodDelivery.addToCart',$menu->id) }}" class="btn btn-warning text-center btn" role="button">+</a> 
                            </div>
                            
        
                             </div>
                             <br>
                        </div>
                      @endforeach
                  </div>
                    
                </li> 
                <hr>
          @empty
          @endforelse
          </ul>  
      </main>
    </div>
 
    @yield('scripts')
     
    </body>
    </html>