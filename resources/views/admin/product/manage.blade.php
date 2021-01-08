
@extends('admin.admin_master')
@section('products')active show-sub @endsection
@section('manage-products') active @endsection

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.category') }}">Admin</a>
      <a class="breadcrumb-item" href="{{ url('admin/home') }}">Manage Product</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-12">
                <div class="card pd-20 pd-sm-40">
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
                    <h6 class="card-body-title">Product List</h6>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-20p">Image</th>
                                <th class="wd-20p">Product Name</th>
                                <th class="wd-15p">Product Quantity</th>
                                <th class="wd-20p">Category</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset($product->image_one) }}" width="50px" height="50px" alt="">
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>{{ $product->category->category_name }}</td>
                                    <td>
                                        @if($product->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/product/edit/'.$product->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/product/delete/'.$product->id) }}" onclick="return confirm('are you shure to delete')" class="btn btn-sm btn-danger">Delete</a>
                                        @if($product->status == 1)
                                        <a href="{{ url('admin/product/inactive/'.$product->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                        @else
                                        <a href="{{ url('admin/product/active/'.$product->id) }}" class="btn btn-sm btn-primary">Active</a>
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


