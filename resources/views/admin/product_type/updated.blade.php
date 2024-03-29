@extends('admin/templates/base')

@section('title','Create product type')

@section('content')
    <div class="title mt-4">
        <h3>Product Type Manager</h3>
    </div>
    <form action="{{route('admin.product_type.update',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" value="{{$data->title}}" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <img src="{{$data->image}}" alt="" style="width: 100px; height: 100px; object-fit:contain;"> <br>
          <label>Change</label>
          <input type="file" name="image" class="@error('image') is-invalid @enderror" placeholder="">
        </div>
        <button class="btn btn-success mt-3">Add</button>
    </form>
@endsection
