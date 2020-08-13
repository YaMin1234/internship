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
<h1> Create Product</h1>
<form action="{{ route('products.store')}}" method="POST">
   
    @csrf
    <div class=" container form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control col-md-5">
    </div>
    <div class=" container form-group">
        <label>Category</label>
        <select class="form-control col-md-5" name="category_id">
            <option>Choose....</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
            {{ $category->name }}
            </option>
        @endforeach
        </select>
        </div>
    <div class="container form-group">
        <button class="btn btn-info">Create Product</button>
    </div>

</form>
    
@endsection