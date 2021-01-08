
@extends('admin.admin_master')
@section('coupon')active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Admin</a>
      <a class="breadcrumb-item" href="#">Coupon</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-8">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Coupon List</h6>
                    @if(session('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('updated')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                    @if(session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('delete')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">SL</th>
                                <th class="wd-15p">Coupon Name</th>
                                <th class="wd-15px">Coupon Discount</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $coupon->coupon_name }}</td>
                                    <td>{{ $coupon->coupon_discount }}</td>
                                    <td>
                                        @if($coupon->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/coupon/edit/'.$coupon->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/coupon/delete/'.$coupon->id) }}" onclick="return confirm('are you shure to delete')" class="btn btn-sm btn-danger">Delete</a>
                                         @if($coupon->status == 1)
                                        <a href="{{ url('admin/coupon/inactive/'.$coupon->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                        @else
                                        <a href="{{ url('admin/coupon/active/'.$coupon->id) }}" class="btn btn-sm btn-primary">Active</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <span class="add-category">Add New Coupon</span>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('store.coupon')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Coupon Name</label>
                                <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" name="coupon_name" id="coupon_name" placeholder="Enter Coupon Name">
                                @error('coupon_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Coupon Discount</label>
                                <input type="text" class="form-control @error('coupon_discount') is-invalid @enderror" name="coupon_discount" id="coupon_discount" placeholder="Enter Coupon Discount">
                                @error('coupon_discount')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


