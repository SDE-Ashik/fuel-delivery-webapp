@extends('admin.layout.app')
@section('title')
    Update Config
@endsection
@section('styles')
    <style>
        .box {
            padding: 24px;
        }
    </style>
@endsection
@section('content')
    <div class="box">
        <form class="row g-3" action="{{ route('saveConfig') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Petrol Price</label>
                <input type="text" name="petrol" value="{{ $config->petrol }}" class="form-control" id="inputEmail4">
                @if ($errors->has('petrol'))
                    <p style="color:red;">{!! $errors->first('petrol') !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Diesel Price</label>
                <input type="text" name="diesel" value="{{ $config->diesel }}" class="form-control" id="inputPassword4">
                @if ($errors->has('diesel'))
                    <p style="color:red;">{!! $errors->first('diesel') !!}</p>
                @endif
            </div>

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Premium Petrol</label>
                <input type="text" name="premium_petrol" value="{{ $config->premium_petrol }}"
                    class="form-control" id="inputEmail4">
                @if ($errors->has('premium_petrol'))
                    <p style="color:red;">{!! $errors->first('premium_petrol') !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Delivery Fee</label>
                <input type="text" name="delivery_fee" value="{{ $config->delivery_fee }}" class="form-control"
                    id="inputPassword4">
                @if ($errors->has('delivery_fee'))
                    <p style="color:red;">{!! $errors->first('delivery_fee') !!}</p>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Pincode</label>
                <input type="text" name="pincode" value="{{ $config->pincode }}" class="form-control"
                    id="inputPassword4">
                @if ($errors->has('pincode'))
                    <p style="color:red;">{!! $errors->first('pincode') !!}</p>
                @endif
            </div>
            <div class="col-12">
                <div class="form-check">
                    <br>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
