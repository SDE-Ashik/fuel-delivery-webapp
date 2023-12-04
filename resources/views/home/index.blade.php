@extends('layout.app')
@section('title')
 Home
@endsection
@section('content')
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/pump.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Fuel</b> Delivery</h1>
                                <h3 class="h2">Reliable Fuel Delivery to Your Doorstep!</h3>
                                <p>
                                Stay ahead with hassle-free fuel service. Swift, secure, and on-demand delivery right when you need it. Experience convenience like never before. Fuelling your journey, wherever it takes you.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/tata.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                            <h1 class="h1 text-success"><b>Fuel</b> Delivery</h1>
                                <h3 class="h2">Effortless Ordering, Lightning-Fast Delivery!</h3>
                                <p>
                                Ordering fuel made simple. Just a few clicks, and we'll be on our way to you. Swift deliveries to keep you moving, so you can focus on what matters. Your journey, our priority</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                            <h1 class="h1 text-success"><b>Fuel</b> Delivery</h1>
                                <h3 class="h2">Fueling Your Lifestyle, On Your Terms!</h3>
                                <p>
                                Discover the freedom of flexible fuel delivery. From daily commutes to weekend getaways, we've got you covered. Convenience redefined, every drop, every mile. Your journey, your schedule</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Fuel Categories </h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/dio.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Petrol</h5>
                <p class="text-center"><a class="btn btn-success" href="#shop">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/kia.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Diesel</h2>
                <p class="text-center"><a class="btn btn-success" href="#shop">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/ktm.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Premium Petrol</h2>
                <p class="text-center"><a class="btn btn-success" href="#shop">Go Shop</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light" id="shop">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Pumps</h1>
                    <p>
                        Fuel is a substance that undergoes a combustion reaction to produce energy. It is a crucial component in various industries, especially in the context of transportation and energy production
                    </p>
                </div>
            </div>
            <div class="row">
                
                @foreach ( $pumpList as $pump )
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            {{-- fix image size --}}
                            <img src="/uploads/pump/{{$pump->image}}" class="card-img-top" alt="..." style="width:100%;height:300px;background-repeat:no-repeat;background-size:contain;">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    {{-- <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i> --}}
                                </li>
                                <li class="text-muted text-right">{{$pump->pincode}}</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{$pump->name}}</a>
                            <p class="card-text">
                               {{$pump->address}} <br>
                               {{$pump->email}} <br>
                               {{$pump->phone}}
                            </p>
                            <p class="text-center"><a class="btn btn-success" href="{{route('oderForm',$pump->id)}}">Order</a></p>
                            <p class="text-muted">Open 24 hours</p>
                        </div>
                    </div>
                </div>
                @endforeach
                
           
            </div>
        </div>
    </section>
@endsection