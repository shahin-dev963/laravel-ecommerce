
@extends('admin.admin_master')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Shahin</a>
      <a class="breadcrumb-item active" href="{{ route('admin.brand') }}">Brand</a>
      <a class="breadcrumb-item active" href="#">Edit</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <span class="add-category">Edit Brand</span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.brand')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $brand->id }}" name="id">
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name" id="brand_name" value="{{ $brand->brand_name }}">
                                @error('brand_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary" >Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


