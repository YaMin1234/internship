@extends('layouts.app')
@section('content')
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
<h1> Create Menu</h1>
<form action="{{route('restaurants.store')}}" method="POST">
   
    @csrf
    {{-- <input type="hidden" name="user_id" value="{{Auth::id()}}"> --}}
    <div class=" container form-group">
        <label>Menu Name</label>
        <input type="text" name="name" class="form-control col-md-5" placeholder=" Menu Name">
    </div>
   
    <div class="container form-group">
        <label>Menu Type</label>
        <select class="form-control col-md-5" name="menu_type_id">
            <option>Choose....</option>
        @foreach($menus as $menu)
            <option value="{{ $menu->id }}">
            {{ $menu->name }}
            </option>
        @endforeach
        </select>
    </div>
    <div class=" container form-group">
        <label>Price</label>
        <input type="text" name="price" placeholder="Price">
    </div>
   
    <div class="container form-group">
        <button class="btn btn-info">Create Menu</button>
    </div>

</form>
    
@endsection