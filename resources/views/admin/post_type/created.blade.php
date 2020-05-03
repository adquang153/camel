@extends('admin/templates/base')

@section('title','Create post type')

@section('content')
    <div class="title mt-4">
        <h3>Post Type Manager</h3>
    </div>
    <form action="{{route('post_type.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Content</label>
          <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror"></textarea>
        </div>
        <button class="btn btn-success mt-3">Add</button>
    </form>
@endsection
