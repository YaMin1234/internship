@extends('layouts.app')
@section('content')
<h1> Create Category</h1>
<form action="{{ route('categories.store')}}" method="POST">
   
    @csrf
    <div class=" container form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control col-md-5">
    </div>
    <div class="container form-group">
        <button class="btn btn-info">Create Category</button>
    </div>

</form>
    
@endsection