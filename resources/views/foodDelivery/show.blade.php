@extends('foodDelivery.layout')
 
@section('title', 'Menus')
 
@section('content')
 
    <main class="py-4">
        <div class="card">
            <div class="card-img-top">
            <img  src="{{ URL::asset('/photos/'. $restaurant->photos) }}" alt="Card image cap">
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
            <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                <b>Main Menu</b>
          </div>
          {{-- <form action="" method="post"> --}}
          <ul style="list-style: none">
            @forelse ($menu_types as $menu_type)
               <b>{{$menu_type->name}}</b>
               

                 <li>
                    <div class="small mt-2"> 
                          @foreach($menu_type->menu as $menu)
                        <div class="container">
                            {{-- <img  src="{{ URL::asset('/photos/'. $menu->photos) }}" alt="Card image cap" > --}}
                         
                        <b>{{$menu->name}}</b>
                        <a href="{{ route('foodDelivery.addToCart',$menu->id) }}" class="btn btn-success text-center" role="button">+</a> 
                      
           
                          <p>1pcs</p>
                          <p>MMK {{$menu->price}}</p>
                        </div>
                        @endforeach
                    </div>
                    
                </li> 
                <hr>
          @empty
          @endforelse
          </ul>  
      </main>
@endsection