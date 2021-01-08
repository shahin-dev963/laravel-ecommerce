
@extends('admin.admin_master')
@section('brand')active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.brand') }}">Category</a>
      <a class="breadcrumb-item" href="{{ url('admin/home') }}">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-8">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Brand List</h6>
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
                                <th class="wd-15p">Brand Name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        @if($brand->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/brand/edit/'.$brand->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/brand/delete/'.$brand->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                         @if($brand->status == 1)
                                        <a href="{{ url('admin/brand/inactive/'.$brand->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                        @else
                                        <a href="{{ url('admin/brand/active/'.$brand->id) }}" class="btn btn-sm btn-primary">Active</a>
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
                        <span class="add-category">Add New Brand</span>
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
                        <form action="{{route('store.brand')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name" id="brand_name" placeholder="Enter Brand Name">
                                @error('brand_name')
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


