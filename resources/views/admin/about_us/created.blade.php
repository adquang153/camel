@extends('admin/templates/base')

@section('title','Create about')

@section('content')
    <div class="title mt-4">
        <h3>About Manager</h3>
    </div>
    <form action="{{route('admin.about_us.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" value="" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Content</label>
          <textarea name="content" cols="30" rows="7" class="form-control @error('content') is-invalid @enderror"></textarea>
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
