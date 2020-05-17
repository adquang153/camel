@extends('admin/templates/base')

@section('title','Create Post')

@section('content')
  <div class="title mt-4">
      <h3>Post Manager</h3>
  </div>
  <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Content</label>
        <textarea name="content" id="" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image_post" class="@error('image_product') is-invalid @enderror" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Type</label>
        <select name="type" id="" class="form-control">
          @foreach($type as $val)
              <option value="{{$val->id}}">{{$val->title}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="">User</label>
        <!-- <input type="text" name="user_id" value="1"> -->
        <select name="user_id" id="" class="form-control">
          @foreach($user as $us)
            <option value="{{$us->id}}">{{$us->id . ' - ' . $us->user_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-check">
          <input id="visible" class="form-check-input" type="checkbox" name="is_visible" value="true">
          <label for="visible" class="form-check-label">is_visible</label>
      </div>
      <button class="btn btn-success mt-3">Add</button>
  </form>
@endsection
