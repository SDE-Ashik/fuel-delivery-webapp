@extends('layout.app')
@section('title')
 SignUp
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
@endsection
@section('content')
<div class="limit">
    <div class="login-container">
        <div class="bb-login">
            <form class="bb-form validate-form" method="POST" action="{{route('registration')}}">@csrf <span class="bb-form-title p-b-26"> Registration </span> <span class="bb-form-title p-b-48"> <i class="mdi mdi-symfony"></i> </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c"> <input class="input100" type="text" name="first_name"> <span class="bbb-input" data-placeholder="First Name"></span> 
                    @if ($errors->has('first_name'))<p style="color:red;">{!!$errors->first('first_name')!!}</p>@endif</div>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c"> <input class="input100" type="text" name="last_name"> <span class="bbb-input" data-placeholder="Last Name"></span>
                    @if ($errors->has('last_name'))<p style="color:red;">{!!$errors->first('last_name')!!}</p>@endif </div>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c"> <input class="input100" type="text" name="email"> <span class="bbb-input" data-placeholder="Email"></span>
                    @if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif </div>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c"> <input class="input100" type="text" name="phone"> <span class="bbb-input" data-placeholder="Phone"></span> 
                    @if ($errors->has('phone'))<p style="color:red;">{!!$errors->first('phone')!!}</p>@endif</div>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c"> <input class="input100" type="text" name="pincode"> <span class="bbb-input" data-placeholder="Pincode"></span> 
                    @if ($errors->has('pincode'))<p style="color:red;">{!!$errors->first('pincode')!!}</p>@endif</div>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c"> <input class="input100" type="text" name="address"> <span class="bbb-input" data-placeholder="Address"></span>
                    @if ($errors->has('address'))<p style="color:red;">{!!$errors->first('address')!!}</p>@endif </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password"> <span class="btn-show-pass"> <i class="mdi mdi-eye show_password"></i> </span> <input class="input100" type="password" name="password"> <span class="bbb-input" data-placeholder="Password"></span>
                    @if ($errors->has('password'))<p style="color:red;">{!!$errors->first('password')!!}</p>@endif </div>
                <div class="login-container-form-btn">
                    <div class="bb-login-form-btn">
                        <div class="bb-form-bgbtn"></div> <button class="bb-form-btn"> Login </button>
                    </div>
                </div>
                <div class="text-center p-t-115"> <span class="txt1">  have an account? </span> <a class="txt2" href="{{route('login')}}"> Login  </a> </div>
            </form>
        </div>
    </div>
</div>
@endsection