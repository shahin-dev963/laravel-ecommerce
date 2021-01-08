
@extends('admin.admin_master')
@section('orders')active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Admin</a>
      <a class="breadcrumb-item" href="#">Orders</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-12">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Orders</h6>
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
                                <th class="wd-15p">Invoice No</th>
                                <th class="wd-15px">Payment Type</th>
                                <th class="wd-20p">Total</th>
                                <th class="wd-15p">Subtotal</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-25px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>
                                        @if($order->coupon_discount == NULL)
                                            <span class="badge badge-danger">No</span>
                                        @else
                                            <span class="badge badge-success">Yes</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/orders/view/'.$order->id) }}" class="btn btn-sm btn-success">View</a>
                                        <a href="{{ url('admin/orders/delete/'.$order->id) }}" onclick="return confirm('are you shure to delete')" class="btn btn-sm btn-danger">Delete</a>
                                         @if($order->status == 1)
                                        <a href="{{ url('admin/orders/inactive/'.$order->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                        @else
                                        <a href="{{ url('admin/orders/active/'.$order->id) }}" class="btn btn-sm btn-primary">Active</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


