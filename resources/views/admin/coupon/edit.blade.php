
@extends('admin.admin_master')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Shahin</a>
      <a class="breadcrumb-item active" href="#">Coupon</a>
      <a class="breadcrumb-item active" href="#">Edit</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <span class="">Edit Coupon</span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.coupon')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $coupon->id }}" name="id">
                            <div class="form-group">
                                <label for="name">Coupon Name</label>
                                <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" name="coupon_name" id="coupon_name" value="{{ $coupon->coupon_name }}">
                                @error('coupon_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Coupon Discount</label>
                                <input type="text" class="form-control @error('coupon_discount') is-invalid @enderror" name="coupon_discount" id="coupon_discount" value="{{ $coupon->coupon_discount }}">
                                @error('coupon_discount')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary" >Update Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


