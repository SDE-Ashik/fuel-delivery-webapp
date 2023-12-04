@extends('layout.app')
@section('title')
 Login
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
@endsection
@section('content')
<div class="limit">
    <div class="login-container">
        <div class="bb-login">
            <form class="bb-form validate-form" method="POST" action="{{route('authenticate')}}">@csrf <span class="bb-form-title p-b-26"> Welcome </span> <span class="bb-form-title p-b-48"> <i class="mdi mdi-symfony"></i> </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c"> <input class="input100" type="text" name="email"> <span class="bbb-input" data-placeholder="Email"></span> </div>
                @if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif
                <div class="wrap-input100 validate-input" data-validate="Enter password"> <span class="btn-show-pass"> <i class="mdi mdi-eye show_password"></i> </span> <input class="input100" type="password" name="password"> <span class="bbb-input" data-placeholder="Password"></span> </div>
                @if ($errors->has('password'))<p style="color:red;">{!!$errors->first('password')!!}</p>@endif
                <div class="login-container-form-btn">
                    @if (Session::has('error'))<p style="color:red;">{{Session::get('error')}}</p>@endif
                    <div class="bb-login-form-btn">
                        
                        <div class="bb-form-bgbtn"></div> <button class="bb-form-btn"> Login </button>
                    </div>
                </div>
                <div class="text-center p-t-115"> <span class="txt1"> Don&rsquo;t have an account? </span> <a class="txt2" href="{{route('signUp')}}"> Sign Up </a> </div>
            </form>
        </div>
    </div>
</div>
@endsection