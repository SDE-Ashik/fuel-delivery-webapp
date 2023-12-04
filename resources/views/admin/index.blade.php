@extends('admin.layout.app')
@section('title')
Admin
@endsection
@section('content')
<br><br>
<h2 align="center">Orders</h2>
<table class="table" style="max-width:60%;">
   
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Order Number</th>
        <th scope="col">Customer</th>
        <th scope="col">Agent</th>
        <th scope="col">Pump</th>
        <th scope="col">Amount</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      
     @foreach ($orders as $key=>$order)
     <tr>
        <th >{{++$key}}</th>
        <td>{{$order->order_number}} <br>
          {{$order->created_at}}
        </td>
        <td>{{$order->name}}<br>
          {{$order->email}}<br>
          {{$order->phone}}<br>
          {{$order->address}}  
        </td>
        <td>
         @if (!empty($order->delivery_agent))
         {{$order->first_name." ".$order->last_name}}<br>
         {{$order->agent_email}}<br>
         {{$order->agent_phone}}<br>
         {{$order->agent_address}} 
         @endif
         </td>
        <td>
          {{$order->pump_name}}<br>
          {{$order->pump_email}}<br>
          {{$order->pump_phone}}<br>
          {{$order->pump_address}} 
        </td>
        <td>₹{{$order->total}}</td>
        <td> 
          @if ($order->status==1)
              Pending
          @elseif ($order->status==2)
              Active
            @else
            Deliverd  
          @endif
        </td>
      </tr>
     @endforeach
      
    </tbody>
  </table>

@endsection