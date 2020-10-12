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
 
<div class=" bg-light" style="height:10px;">
 
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
                           <a href="{{route('foodDelivery.cart')}}" class="btn btn-warning btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
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
          <div>
            <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                <b>Main Menu</b>
          </div>
          @foreach($menu_types as $menu_type)
          <a href="{{route('foodDelivery.showMenu', $menu_type->id)}}" style="text-decoration: none" class="menuType" >{{$menu_type->name}}</a>
        @endforeach
        <hr>
   
          {{-- <form action="" method="post"> --}}
          <ul style="list-style: none">
            @forelse ($menu_types as $menu_type)
               <b>{{$menu_type->name}}</b>
               

                 <li>
                    <div class="row"> 
                        @foreach($menu_type->menu as $menu)
                       
                          <div class="col-md-6 col-md-offset-4">
                            <div class="shadow" >
                                <a href="{{ route('foodDelivery.addToCart',$menu->id) }}" style="font-size: 15px;padding-left:20px;font-weight:bold;text-decoration:none;" class="menuName">{{$menu->name}}</a> 
                                    {{-- <b style="font-size: 13px;padding-left:20px;">{{$menu->name}}</b> --}}
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