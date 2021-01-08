
@extends('admin.admin_master')
@section('category')active @endsection

@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.category') }}">Category</a>
      <a class="breadcrumb-item" href="{{ url('admin/home') }}">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title row">
            <div class="col-sm-8">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Basic Responsive DataTable</h6>
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
                                <th class="wd-15p">Category Name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        @if($category->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/category/edit/'.$category->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('admin/category/delete/'.$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        @if($category->status == 1)
                                        <a href="{{ url('admin/category/inactive/'.$category->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                        @else
                                        <a href="{{ url('admin/category/active/'.$category->id) }}" class="btn btn-sm btn-primary">Active</a>
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
                        <span class="add-category">Add New Category</span>
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
                        <form action="{{route('store.category')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" placeholder="Enter Category Name">
                                @error('category_name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <input type="hidden" id="id">
                            <button type="submit" class="btn btn-primary add-button" >Submit</button>
                            {{-- <button type="submit" class="btn btn-primary update-button" onclick="updateData()">Update</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


