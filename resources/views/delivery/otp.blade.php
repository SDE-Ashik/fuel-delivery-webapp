@extends('admin.layout.app')
@section('title')
Otp Verification
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
    <form class="row g-3" action="{{route('verifyOtp')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Order Number : {{$order->order_number}}</label>
          <input type="text" required name="otp" class="form-control" id="inputEmail4">
          @if (Session::has('error'))<p style="color:red;">{{Session::get('error')}}</p>@endif
        </div>
       <input type="hidden" name="order_id" value="{{$order->id}}">
        
        <div class="col-12">
          <div class="form-check">
            <br> 
          </div>
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Verify Otp</button>
        </div>
      </form>
</div>

@endsection