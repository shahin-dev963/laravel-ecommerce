
@extends('admin.admin_master')
@section('orders')active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Admin</a>
      <a class="breadcrumb-item" href="#">Order View</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Shipping Address</h6>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="shipping_first_name" value="{{ $shipping->shipping_first_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Last  Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="shipping_last_name" value="{{ $shipping->shipping_last_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="shipping_email" value="{{ $shipping->shipping_email }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Shipping Phone: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="shipping_email" value="{{ $shipping->shipping_email }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="address" value="{{ $shipping->address }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="state" value="{{ $shipping->state }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Post Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_code" value="{{ $shipping->post_code }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card pd-20 pd-sm-40" style="margin-top: 20px; width: 100%">
                <h6 class="card-body-title">Order</h6>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Invoice No: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="invoice_no" value="{{ $order->invoice_no }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="payment_type" value="{{ $order->payment_type }}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="total" value="{{ $order->total }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Subtotal: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subtotal" value="{{ $order->subtotal }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Coupon Discount: <span class="tx-danger"></span></label>
                                @if($order->coupon_discount == NULL)
                                    <span class="badge badge-pill badge-danger">No</span>
                                @else
                                    <span class="badge badge-pill badge-success">{{ $order->coupon_discount }}%</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card pd-20 pd-sm-40" style="margin-top: 20px; width:100%">
                <h6 class="card-body-title">Order Items</h6>
                <div class="form-layout">
                    <div class="row mg-b-25 ">
                        <div class="col-sm-12">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">SL</th>
                                        <th class="wd-15p">Image</th>
                                        <th class="wd-15px">Product Name</th>
                                        <th class="wd-20p">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($orderItems as $orderItem)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><img src="{{ asset($orderItem->OrderItemToProductJoin->image_one) }}" style="height: 50px; width: 50px;" alt=""></td>
                                            <td>{{ $orderItem->OrderItemToProductJoin->product_name }}</td>
                                            <td>{{ $orderItem->product_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


