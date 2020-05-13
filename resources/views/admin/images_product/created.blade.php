@extends('admin/templates/base')

@section('title','Create image')

@section('content')
    <div class="title mt-4">
        <h3>Image Manager</h3>
    </div>
    <form action="{{route('admin.images.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Product ID</label>
          <select name="product_id" id="" class="form-control @error('product_id') is-invalid @enderror">
              @foreach($products as $pro)
                <option value="{{$pro->id}}">{{$pro->id . ' - ' . $pro->title}}</option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file" name="image" class="" placeholder="">
        </div>
        <div class="form-check">
            <input id="visible" class="form-check-input" type="checkbox" name="is_visible" value="true">
            <label for="visible" class="form-check-label">is_visible</label>
        </div>
        <button class="btn btn-success mt-3">Add</button>
    </form>
@endsection
