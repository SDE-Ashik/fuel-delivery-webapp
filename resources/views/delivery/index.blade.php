@extends('admin.layout.app')
@section('title')
Delivery Agent
@endsection
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <ul class="list-group shadow">

                @foreach ($orders as $order)
                    <li class="list-group-item">

                        <div class="media align-items-lg-center flex-column flex-lg-row">
                            <img src="{{asset('uploads/pump/'.$order->pump_image)}}"
                                alt="Generic placeholder image" width="250" height="200" class="order-1 order-lg-1">

                            <div class="media-body order-2 order-lg-2 ml-lg-5">
                                <h5 class="mt-0 mb-1">Order Number : {{ $order->order_number }} -{{$order->created_at->format('Y-M-D H:i')}}</h5>
                               

                                <div class="product-rating mb-2">
                                    <span class="badge23"><i class="fa fa-star"></i>{{$order->pump_name}},{{$order->pump_location}}</span>
                                    <span class="rating-review mb-1">-{{$order->pump_email}} &amp; {{$order->pump_phone}}</span>
                                </div>

                                <span class="product_price price-new">₹ {{ $order->total }} </span>
                                <hr class="mb-2 mt-1 seperator">
                                <div class="d-flex align-items-center justify-content-between mt-1">

                                    <ul class="list-inline small">
                                        @if (!empty($order->petrol_qty))
                                            <li><img
                                                    src="https://img.icons8.com/material-outlined/10/000000/filled-circle--v1.png">Petrol:

                                                {{ $order->petrol_qty }} Litre

                                            </li>
                                        @endif
                                        @if (!empty($order->diesel_qty))
                                            <li><img
                                                    src="https://img.icons8.com/material-outlined/10/000000/filled-circle--v1.png">Diesel:

                                                {{ $order->diesel_qty }} Litre

                                            </li>
                                            @endif @if (!empty($order->premium_petrol_qty))
                                                <li><img
                                                        src="https://img.icons8.com/material-outlined/10/000000/filled-circle--v1.png">Premium Petrol:

                                                    {{ $order->premium_petrol_qty }} Litre

                                                </li>
                                            @endif

                                    </ul>

                                    <ul class="list-inline small">
                                   
                                       <li>
                                             {{$order->name}}   <br>
                                             {{$order->email}}<br>
                                             {{$order->phone}}<br>
                                             {{$order->address}} - {{$order->pincode}}                                        
                                           </li>
                                           
                                       <li> <a href="{{route('completeOrder',$order->id)}}"class="btn btn-primary"> Complete Order </a>
                                           </li>
                                     
                                      
                                      
                                     

                                    </ul>

                                </div>
                            </div>

                        </div>
                    </li>
                @endforeach








            </ul>

        </div>
    </div>
</div>
@endsection