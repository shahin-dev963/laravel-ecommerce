
@extends('admin.admin_master')
@section('products')active show-sub @endsection
@section('manage-products') active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Admin</a>
      <a class="breadcrumb-item" href="#">Update Products</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="card pd-20 pd-sm-40">
                <form action="{{ route('update-product') }}" method="POST" >
                @csrf
                <input type="hidden" value="{{ $product->id }}" name="id">
                    <h6 class="card-body-title">Update Products</h6>
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" placeholder="Enter Product Name">
                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}" placeholder="Enter Product Code">
                                        @error('product_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_price" value="{{ $product->product_price }}" placeholder="Enter Product Price">
                                    @error('product_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="Enter Product Quantity">
                                    @error('product_quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                                        <option label="Choose category"></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? "selected":""}}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                                        <option label="Choose brand"></option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? "selected":""}}>{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Short Description <span class="tx-danger">*</span></label>
                                    <textarea name="short_description" id="summernote" >{{  $product->short_description }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Long Description <span class="tx-danger">*</span></label>
                                    <textarea name="long_description" id="summernote2" >{{  $product->long_description }}</textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5 mb-5" type="submit">Update Data</button>
                        </div>
                    </div>
                </form>


                <form action="{{ route('update-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <input type="hidden" value="{{ $product->image_one }}" name="img_one">
                    <input type="hidden" value="{{ $product->image_two }}" name="img_two">
                    <input type="hidden" value="{{ $product->image_three }}" name="img_three">

                        <h6 class="card-body-title">Update Image</h6>
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image One <span class="tx-danger">*</span></label>
                                        <img src="{{ asset($product->image_one) }}" width="120px" height="120px" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image Two <span class="tx-danger">*</span></label>
                                        <img src="{{ asset($product->image_two) }}" width="120px" height="120px" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image Three <span class="tx-danger">*</span></label>
                                        <img src="{{ asset($product->image_three) }}" width="120px" height="120px" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image One <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="image_one">
                                        @error('image_one')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image Two <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="image_two">
                                        @error('image_two')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Image Three <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="image_three">
                                        @error('image_three')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-layout-footer">
                                <button class="btn btn-info mg-r-5">Update Image</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection


