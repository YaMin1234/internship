@extends('layouts.app')
@section('content')
<h1> Update Product</h1>
<form action="{{ route('products.update',$product->id)}}" method="POST">
   
    @csrf
    @method("PATCH")
    <div class=" container form-group">
        <label>Name</label>
    <input type="text" name="name" class="form-control col-md-5" value="{{$product->name}}">
    </div>
    <div class="container  form-group">
        <label>Category</label>
        <select class="form-control col-md-5" name="category_id">
            <option>Choose....</option>
        @foreach($categories as $category)
    
            <option value="{{ $category->id }}" @if($product->category_id == $category->id) {{"selected"}} @endif>
            {{ $category->name }}
            </option>
        @endforeach
        </select>
    </div>
    <div class="container form-group">
        <button class="btn btn-info">Update Product</button>
    </div>

</form>
    
@endsection