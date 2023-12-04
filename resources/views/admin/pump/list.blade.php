@extends('admin.layout.app')
@section('title')
Admin Pump List
@endsection
@section('content')
<br><br>
<a href='{{route('addPump')}}' class="btn btn-primary">Add New Pump</a><br><br>

<table class="table" style="max-width:60%;">
   
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Location</th>
        
        <th scope="col">Pincode</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      
     @foreach ($pumpList as $key=>$pump)
     <tr>
        <th >{{++$key}}</th>
        <td>{{$pump->name}}<br>
          {{$pump->email}}<br>
          {{$pump->phone}}<br>
          {{$pump->address}}  
        </td>
        <td>{{$pump->location}}</td>
        <td>{{$pump->pincode}}</td>
        <td> <a href="{{route('editPump',$pump->id)}}" class="btn btn-warning">Edit</a>
          <a href="{{route('deletePump',$pump->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
     @endforeach
      
    </tbody>
  </table>



@endsection