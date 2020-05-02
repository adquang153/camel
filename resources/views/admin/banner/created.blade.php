@extends('admin/templates/base')

@section('title','Create banner')

@section('content')
    <div class="title mt-4">
        <h3>Banner Manager</h3>
    </div>
    <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file" name="image_banner" class="" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Start date</label>
          <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror placeholder="">
        </div>
        <div class="form-group">
          <label for="">End date</label>
          <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"" placeholder="">
        </div>
        <div class="form-check">
            <input id="visible" class="form-check-input" type="checkbox" name="is_visible" value="true">
            <label for="visible" class="form-check-label">is_visible</label>
        </div>
        <button class="btn btn-success mt-3">Add</button>
    </form>
@endsection
