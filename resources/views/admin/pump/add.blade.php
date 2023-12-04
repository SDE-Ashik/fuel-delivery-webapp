@extends('admin.layout.app')
@section('title')
Add new Pump
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
    <form class="row g-3" action="{{route('savePump')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Pump Name</label>
          <input type="text" name="name" class="form-control" id="inputEmail4">
          @if ($errors->has('name'))<p style="color:red;">{!!$errors->first('name')!!}</p>@endif
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Pincode</label>
          <input type="text" name="pincode" class="form-control" id="inputPassword4">
          @if ($errors->has('pincode'))<p style="color:red;">{!!$errors->first('pincode')!!}</p>@endif
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
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
          <label for="inputCity" class="form-label">Location</label>
          <input type="text" name="location" class="form-control" id="inputCity">
          @if ($errors->has('location'))<p style="color:red;">{!!$errors->first('location')!!}</p>@endif
        </div>
        
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Image</label>
          <input type="file" name="image" class="form-control" id="inputZip">
          @if ($errors->has('image'))<p style="color:red;">{!!$errors->first('image')!!}</p>@endif
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