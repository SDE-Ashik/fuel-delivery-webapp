@extends('admin.layout.app')
@section('title')
Delivery Agents
@endsection
@section('content')
<br><br>
<a href='{{route('addAgent')}}' class="btn btn-primary">Add New Delivery Agent</a><br><br>
<table class="table" style="max-width:60%;">
   
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Joining Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      
     @foreach ($users as $key=>$user)
     <tr>
        <th >{{++$key}}</th>
        <td>{{$user->first_name." ".$user->last_name}}<br>
          {{$user->email}}<br>
          {{$user->phone}}<br>
          {{$user->address}}  
        </td>
        <td>{{$user->created_at}}</td>
        <td> 
          <a href="{{route('deleteAgent',$user->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
     @endforeach
      
    </tbody>
  </table>

@endsection