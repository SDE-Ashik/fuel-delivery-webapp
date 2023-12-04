@extends('layout.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">
@endsection
@section('title')
    Order
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity(Litre)</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="petrol-section">
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="{{ asset('assets/img/dio.jpg') }}" class="img-sm">
                                            </div>
                                            <figcaption class="info"> <a href="#" class="title text-dark"
                                                    data-abc="true">Petrol</a>

                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td> <select class="form-control" id="petrol">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="6">6</option>
                                            <option value="10">10</option>
                                        </select> </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price" id="petrol-price"></var> <small
                                                class="text-muted"> ₹{{ $config->petrol }} per/l</small> </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <a id="remove-petrol" class="btn btn-light" data-abc="true"> Remove</a>
                                    </td>
                                </tr>
                                <tr id="diesel-section">
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="{{ asset('assets/img/kia.jpg') }}" class="img-sm">
                                            </div>
                                            <figcaption class="info"> <a href="#" class="title text-dark"
                                                    data-abc="true">Diesel</a>

                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td> <select class="form-control" id="diesel">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="6">6</option>
                                            <option value="10">10</option>
                                        </select> </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price" id="diesel-price"></var> <small
                                                class="text-muted"> ₹{{ $config->diesel }} per/l </small> </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <a id='remove-diesel' class="btn btn-light btn-round" data-abc="true"> Remove</a>
                                    </td>
                                </tr>
                                <tr id="pr_petrol-section">
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="{{ asset('assets/img/ktm.jpg') }}" class="img-sm">
                                            </div>
                                            <figcaption class="info"> <a href="#" class="title text-dark"
                                                    data-abc="true">Premium Petrol</a>

                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td> <select class="form-control" id="premium_petrol">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="6">6</option>
                                            <option value="10">10</option>
                                        </select> </td>
                                    <td>
                                        <div class="price-wrap"> <var class="price" id="premium_petrol-price"></var> <small
                                                class="text-muted"> ₹{{ $config->premium_petrol }} per/l</small> </div>
                                    </td>
                                    <td class="text-right d-none d-md-block">
                                        <a id="remove-pr_petrol" class="btn btn-light btn-round" data-abc="true">
                                            Remove</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> From:<br>
                                <small>
                                    {{ $pump->name }}<br>
                                    {{ $pump->address }}<br>
                                    {{ $pump->location }}<br>
                                    {{ $pump->email }}<br>
                                    {{ $pump->phone }}<br>
                                </small>
                                <div class="input-group"> To: <br>
                                    @php
                                        $user = Auth::user();
                                    @endphp
                                    {{ $user->first_name . ' ' . $user->last_name }}<br>
                                    {{ $user->email }}

                                    </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3" id="total-fuel-price"></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Delivery Charge:</dt>
                            <dd class="text-right  ml-3">-₹{{ $config->delivery_fee }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong id="total-price"></strong></dd>
                        </dl>
                        <hr> <a id="purchase" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make
                            Purchase </a> <a href="#" class="btn btn-out btn-success btn-square btn-main mt-2"
                            data-abc="true">Continue Shopping</a>
                    </div>
                </div>
            </aside>
        </div>
    </div><br><br>
@endsection

@section('script')
    <script>
        const pumpId = '{{$pump->id}}';
        var petrol = '{{ $config->petrol }}';
        var diesel = '{{ $config->diesel }}';
        var premium_petrol = '{{ $config->premium_petrol }}';
        var delivery_charge = '{{ $config->delivery_fee }}'
        var total_fuel_price = 0;
        //   alert($('#premium_petrol').val())
        $(function() {
            $(document).on("click", "#remove-petrol", function() {
                $('#petrol-section').hide();
                petrol = 0;
                calculatePrice();
            });
            $(document).on("click", "#remove-diesel", function() {
                $('#diesel-section').hide();
                diesel = 0;
                calculatePrice();
            });
            $(document).on("click", "#remove-pr_petrol", function() {
                $('#pr_petrol-section').hide();
                premium_petrol = 0;
                calculatePrice();
            });
            $('#petrol').change(function() {
                calculatePrice();
            });
            $('#diesel').change(function() {
                calculatePrice();
            });
            $('#premium_petrol').change(function() {
                calculatePrice();
            });
            calculatePrice();

            function calculatePrice() {
                let current_petrol_price = petrol * $('#petrol').val()
                let current_diesel_price = diesel * $('#diesel').val();
                let current_preminum_petrol = premium_petrol * $('#premium_petrol').val();
                total_fuel_price = current_diesel_price + current_petrol_price + current_preminum_petrol;
                total_amount = parseInt(total_fuel_price) + parseInt(delivery_charge);

                $("#premium_petrol-price").html('₹' + parseInt(current_preminum_petrol));
                $("#petrol-price").html('₹' + parseInt(current_petrol_price));
                $("#diesel-price").html('₹' + parseInt(current_diesel_price));
                $("#total-fuel-price").html('₹' + parseInt(total_fuel_price));
                $("#total-price").html('₹' + total_amount);
            }

            $(document).on("click", "#purchase", function() {
        
                if (total_fuel_price <= 0) {
                    alert('Please Select atleast one fuel');
                    location.reload();
                } else {
                    $.ajax({
                        type: "POST",
                        url: '{{ route('saveOrder') }}',
                        contentType: "application/json",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: JSON.stringify({
                            'petrol_qty': $("#petrol").val(),
                            'diesel_qty': $("#diesel").val(),
                            'premium_petrol_qty': $("#premium_petrol").val(),
                            'premium_petrol':premium_petrol,
                            'petrol' : petrol,
                            'diesel':diesel,
                            'pump_id':pumpId
                        }),
                        success: function(response) {
                            window.location = "{{route('orderList')}}";
                            console.log(response);
                        },
                        error: function(response) {
                            alert('Server error please try again');
                        }
                    });
                }
            });


        });
    </script>
@endsection
