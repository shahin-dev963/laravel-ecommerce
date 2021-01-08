
@extends('admin.admin_master')

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Shahin</a>
      <a class="breadcrumb-item active" href="{{ route('admin.category') }}">Category</a>
      <a class="breadcrumb-item active" href="#">Edit</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <span class="add-category">Edit Category</span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update.category')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $category->id }}" name="id">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" value="{{ $category->category_name }}">
                                @error('category_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary" >Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


