@extends('admin/templates/base')

@section('title','Create product type')

@section('content')
    <div class="title mt-4">
        <h3>Product Type Manager</h3>
    </div>
    <form action="{{route('admin.product_type.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Content</label>
          <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="">
        </div>
        <button class="btn btn-success mt-3">Add</button>
    </form>
@endsection
