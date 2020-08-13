@extends('layouts.app')
@section('content')
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Category</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
           
            <tr>
            <td class="text-center">  <a href="{{route('products.show', $product->id)}}"> {{$product->name}}</a>
                <div class="small mt-2">
                By <b>{{$product->user->name}}</b>,
                    {{ $product->created_at->diffForHumans() }}
                    </div> </td>
                <td class="text-center">{{$product->category->name}}</td>
                <td>
                <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('products.destroy', $product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick='return confirm("Are you sure to delete")'>Delete</button>
                    
                </form>
                   
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection