@extends('layouts.app')
@section('content')
<h3>All User Name</h3>
<ul>
      @forelse ($users as $user)
       
          <li>
            <b>{{$user->name}}</b>
            <form action="{{route('admin.delete', $user->id)}}" method="POST">
                @csrf
                <button class="btn btn-link" onclick='return confirm("Are you sure to delete")'>Delete</button>
            </form>
        </li>
        
     
      @empty 
      @endforelse
  </ul>

@endsection