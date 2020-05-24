@extends('admin/templates/base')

@section('title','Edit about')

@section('content')
    <div class="title mt-4">
        <h3>About Manager</h3>
    </div>
    <form action="{{route('admin.about_us.update',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" value="{{$data->title}}}" value="" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Content</label>
          <textarea name="content" cols="30" rows="7" class="form-control @error('content') is-invalid @enderror">{{$data->content}}</textarea>
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <img src="{{asset($data->image)}}" alt="" style="width: 50px;height:50px;object-fit:contain">
          <br>
          <label>Change</label>
          <input type="file" name="image" class="" placeholder="">
        </div>
        <div class="form-check">
            <input id="visible" class="form-check-input" type="checkbox" name="is_visible" value="true" {{$data->is_visible=='Y'?'checked':''}}>
            <label for="visible" class="form-check-label">is_visible</label>
        </div>
        <button class="btn btn-success mt-3">Add</button>
    </form>
@endsection
