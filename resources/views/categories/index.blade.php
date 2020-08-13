@extends('layouts.app')
@section('content')

<div class="container">
    @if(session('info'))
    <div class="alert alert-info">
    {{ session('info') }}
    </div>
    @endif
</div>

    <h1>Category List</h1>
        <ul>
            @foreach ($categories as $category)
            
          <li>   {{$category->name}} 
               [<a href="{{route('categories.edit', $category->id)}}" class="text text-success">Edit</a>]
                [<a href="{{route('categories.destroy', $category->id)}}" class="text text-danger">Delete</a>]
                   
                   
          </li>
            
            @endforeach
        </ul>
@endsection