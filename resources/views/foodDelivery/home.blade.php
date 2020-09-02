<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>food delivery</title>
    <style>
        html,
body,
header,
.view {
  height: 100%;
}
@media (max-width: 500px) {
  html,
  body,
  header,
  .view {
    height: 100vh;
  }
}
.top-nav-collapse {
  background-color: #78909c !important;
}
.navbar:not(.top-nav-collapse) {
  background: transparent !important;
}
@media (max-width: 991px) {
  .navbar:not(.top-nav-collapse) {
    background: #78909c !important;
  }
}
h1 {
  letter-spacing: 8px;
}
h5 {
  letter-spacing: 3px;
}
.hr-light {
  border-top: 3px solid #fff;
  width: 80px;
}
    </style>
</head>
<body>
    {{-- <div class="view" style="background-image: url('{{ asset('photos/index.jpg')}}'); background-repeat: no-repeat; background-size: cover; background-position: center center;"> --}}
    
        <div class="mask rgba-black-light align-items-center">
        
          <div class="container">
            
            <div class="row">
              
              <div class="col-md-12 mb-4 white-text text-center">
                <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>Food delivery</strong></h1>
                <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                <h5 class="text-uppercase mb-4 white-text wow fadeInDown"><strong>Food Delivery from the restaurant.Order now!</strong></h5>
                <a href="{{route('foodDelivery.index')}}"  class="btn btn-primary">Delivery</a>
                <a  href="{{route('foodDelivery.index')}}" class="btn btn-primary">Pick up</a>
              </div>
             
            </div>
            
          </div>
          
        </div>
        
      {{-- </div> --}}
      {{-- href="{{route('foodDelivery.index')}}" --}}
</body>
</html>