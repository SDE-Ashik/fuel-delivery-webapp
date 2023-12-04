@extends('admin.layout.app')
@section('title')
Add new agent
@endsection
@section('styles')
    <style>
.box{
    padding: 24px;
}

        </style>
@endsection
@section('content')
<div class="box">
    <form class="row g-3" action="{{route('saveAgent')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">First Name</label>
          <input type="text" name="first_name" class="form-control" id="inputEmail4">
          @if ($errors->has('first_name'))<p style="color:red;">{!!$errors->first('first_name')!!}</p>@endif
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Last Name</label>
          <input type="text" name="last_name" class="form-control" id="inputPassword4">
          @if ($errors->has('last_name'))<p style="color:red;">{!!$errors->first('last_name')!!}</p>@endif
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" name="address" class="form-control" id="inputAddress" placeholder="">
          @if ($errors->has('address'))<p style="color:red;">{!!$errors->first('address')!!}</p>@endif
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4">
            @if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="inputPassword4">
            @if ($errors->has('phone'))<p style="color:red;">{!!$errors->first('phone')!!}</p>@endif
          </div>
        
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="inputCity">
          @if ($errors->has('password'))<p style="color:red;">{!!$errors->first('password')!!}</p>@endif
        </div>
        
        
        <div class="col-12">
          <div class="form-check">
            <br> 
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
</div>

@endsection