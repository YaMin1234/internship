<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | FOOD-ORDERING</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head><!--/head-->

<style>

        .paymentWrap {
    padding: 50px;
}

.paymentWrap .paymentBtnGroup {
    max-width: 800px;
    margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
    padding: 40px;
    box-shadow: none;
    position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
    outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
    border-color: #4cd264;
    outline: none !important;
    box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
    position: absolute;
    right: 3px;
    top: 3px;
    bottom: 3px;
    left: 3px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    border: 2px solid transparent;
    transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
    background-image: url("http://citinewslive.com/wp-content/uploads/2017/01/cash-handed-over.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
    background-image: url("https://www.paypalobjects.com/webstatic/mktg/logo-center/PP_Acceptance_Marks_for_LogoCenter_266x142.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
    background-image: url("http://www.theindependentbd.com/assets/news_images/bkash.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.vishwa {
    background-image: url("https://cdn0.iconfinder.com/data/icons/50-payment-system-icons-2/480/Payza.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash {
    background-image: url("http://www.busbooking.lk/img/carousel/BusBooking.lk_ezCash_offer.png");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
    border-color: #4cd264;
    outline: none !important;
}
.sub_menu{
    display: inline-block;
}
    </style>


<body>
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                {{-- <li><a href="#"><i class="fa fa-phone"></i> +8801726-959864</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> princemahamud687@gmail.com</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="{{URL::to('frontend/images/home/logo.png')}}" alt="" /></a>
                        </div>
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                              

                        <?php $customer_id=session()->get('customer_id');
                              $shipping_id=session()->get('shipping_id');
                        ?>

                     <?php if($customer_id ==NULL && $shipping_id==NULL){?>
                            <li><a href="{{route('login-check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                        <?php }if($customer_id !=NULL && $shipping_id==NULL){?>
                              <li><a href="{{route('checkout')}}">Checkout</a></li>
                        <?php }if($customer_id !=NULL && $shipping_id!=NULL){?>
                               <li><a href="{{route('payment')}}">Checkout</a></li>
                        <?php }else{}?>


                                <li><a href="{{ route('foodDelivery.cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <?php if($customer_id != NULL){?>
                                <li><a href="{{route('customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                          <?php  }else{?>
                            
                                <li><a href="{{route('login-check')}}"><i class="fa fa-lock"></i> Login</a></li>
                          <?php } ?>

                           
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{route('foodDelivery.index')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                     
                                       <?php $customer_id=Session::get('customer_id'); ?>
                                          <?php if($customer_id != NULL){?>
                                           <li><a href="{{route('checkout')}}"> Checkout</a></li>
                                         <?php  }else{?>
                                            <li><a href="{{route('login-check')}}"> Checkout</a></li>
                                        <?php } ?>
                                        <li><a href="{{ route('foodDelivery.cart') }}">Cart</a></li> 
                                        
                                    </ul>
                                </li> 
                              
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
    

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                             <div class="panel panel-default">
                         <?php
                           $all_published_category=DB::table('food_categories')->get();
                                                        
                            foreach($all_published_category as $category){?>                   
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{route('foodDelivery.category',$category->id)}}">{{$category->name}}</a></h4>
                                </div>
                            </div>
                        
                         <?php } ?> 
                           </div>
                      </div>

                        <div class="price-range">
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">TK 0</b> <b class="pull-right">TK 1000</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
</head>
<body>
    <main>
        <h3>All Restaurants</h3>
       
           <div class="row">
               <div class="card-group">
                @forelse ($restaurants as $restaurant)
                <div class="col-sm-3">
                       <div class="card">
                           <img class="card-img-top" src="{{ URL::asset('/photos/'. $restaurant->photos) }}" alt="Card image cap" >
                            <div class="card-body">
                               <h5 class="card-title"><a href="{{route('foodDelivery.show', $restaurant->id)}}" style="text-decoration: none"> {{$restaurant->name}}</a></h5>
                                <p class="card-text"> 
                                   {{-- by<b>{{$restaurant->user->name}}</b> --}}
                                   {{$restaurant->created_at->diffForHumans() }}</p>
                                <p class="card-text">
                                       Available Food category:{{$restaurant->food_category->name}}</p>
                           </div>
                               </div>
                   
                           </div>  
           @empty    
           @endforelse 
       </div> 
       
  </div>
   
         
</main>
</div>
</div>
</div>
</section>

<footer id="footer"><!--Footer-->
<div class="footer-top">
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="companyinfo">
                <h2><span>Food</span>-Ordering</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
            </div>
        </div>
        

<div class="footer-widget">
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>Service</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">Online Help</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Order Status</a></li>
                    <li><a href="#">Change Location</a></li>
                    <li><a href="#">FAQ’s</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>Quock Food</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">APPETIZER</a></li>
                    <li><a href="#">BEEF</a></li>
                    <li><a href="#">BURGER & SANDWICH</a></li>
                    <li><a href="#">CHICKEN</a></li>
                    <li><a href="#">PRAWN</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>Policies</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privecy Policy</a></li>
                    <li><a href="#">Refund Policy</a></li>
                    <li><a href="#">Billing System</a></li>
                    <li><a href="#">Ticket System</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>About Food-Order</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">Company Information</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Store Location</a></li>
                    <li><a href="#">Affillate Program</a></li>
                    <li><a href="#">Copyright</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3 col-sm-offset-1">
            <div class="single-widget">
                <h2>About Food-Order</h2>
                <form action="#" class="searchform">
                    <input type="text" placeholder="Your email address" />
                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                </form>
            </div>
        </div>
        
    </div>
</div>
</div>

<div class="footer-bottom">
<div class="container">
    <div class="row">
        <p class="pull-left">Copyright © 2020 FOOD-ORDERING Inc. All rights reserved.</p>
     
    </div>
</div>
</div>

</footer><!--/Footer-->



<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.j')}}s"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>

</body>
</html>
