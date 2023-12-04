@extends('layout.app')
@section('title')
    My Orders
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12 mx-auto">

                <ul class="list-group shadow">

                    @foreach ($orders as $order)
                        <li class="list-group-item">

                            <div class="media align-items-lg-center flex-column flex-lg-row">
                                <img src="{{ asset('uploads/pump/' . $order->pump_image) }}"
                                    alt="Generic placeholder image" width="250" height="200" class="order-1 order-lg-1">

                                <div class="media-body order-2 order-lg-2 ml-lg-5">
                                    <h5 class="mt-0 mb-1">Order Number : {{ $order->order_number }}</h5>
                                    @if ($order->status==1)
                                   

                                    <span style="background-color: yellow">Wating for Delivery Agent</span>
                                    @elseif ($order->status==2)
                                    <span style="background-color:green">Active</span>
                                    @else
                                    <span style="background-color: blue">Deliverd</span>

                                    @endif

                                    <div class="product-rating mb-2">
                                        <span class="badge23"><i
                                                class="fa fa-star"></i>{{ $order->pump_name }},{{ $order->pump_location }}</span>
                                        <span class="rating-review mb-1">-{{ $order->pump_email }} &amp;
                                            {{ $order->pump_phone }}</span>
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
                                           @if (!empty($order->delivery_agent))
                                           <li><li>Delivery Agent:{{$order->first_name." ".$order->last_name}}<br>
                                            {{$order->agent_email}}<br>
                                            {{$order->agent_phone}}<br>
                                            {{$order->agent_address}} 
                                               </li>
                                           @else
                                           <li> <a href="{{route('cancelOrder',$order->id)}}"class="btn btn-danger"> Cancel Order </a>
                                               </li>
                                           @endif
                                          
                                           

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
