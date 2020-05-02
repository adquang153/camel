@extends('admin/templates/base')

@section('title','Create Product')

@section('content')
    <div class="title mt-4">
        <h3>Product Manager</h3>
    </div>
    <form action="{{route('products.update',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" value="{{$data->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Content</label>
          <input type="text" name="content" value="{{$data->content}}" class="form-control @error('content') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <img src="{{$data->image_product}}" alt="" style="width: 100px; height: 100px; object-fit:contain;"> <br>
          <label>Change</label>
          <input type="file" name="image_product" class="@error('image_product') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Price</label>
          <input type="number" name="price" value="{{$data->price}}" class="form-control @error('price') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Type</label>
          <select name="type" id="" class="form-control">
            @foreach($type as $val)
                <option value="{{$val->id}}">{{$val->title}}</option>
            @endforeach
          </select>
        <input type="text" name="user_id" value="1">

        </div>
        <div class="form-check">
            <input id="visible" class="form-check-input" type="checkbox" name="is_visible" value="true">
            <label for="visible" class="form-check-label">Text</label>
        </div>
        <button class="btn btn-success mt-3">Add</button>
    </form>
@endsection
