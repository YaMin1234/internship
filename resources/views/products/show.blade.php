@extends('layouts.app')
@section('content')
<p>Name:<i>{{$product->name}}</i></p>

<p>Category:<b>{{$product->category->name}}</b>
<ul class="list-group">
    <li class="list-group-item active">
      <b>Comments ({{ count($product->comments) }})</b>
    </li>
        @foreach($product->comments as $comment)
        <li class="list-group-item">
           {{ $comment->content }}
           <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">&times;</button>
            
        </form>
        <div class="small mt-2">
            By <b>{{ $comment->user->name }}</b>,
            {{ $comment->created_at->diffForHumans() }}
            </div>
        </li>
        @endforeach
        </ul>
         
        @auth
        <div class="container form-group">
            <form action="{{ route('comments.store')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <textarea name="content" class="form-control mb-2"
            placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment"
            class="btn btn-secondary">
        </form>
        </div>
        @endauth
    
@endsection