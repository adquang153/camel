@extends('admin/templates/base')

@section('title','Edit banner')

@section('content')
    <div class="title mt-4">
        <h3>Banner Manager</h3>
    </div>
    <form action="{{route('admin.banner.update',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" value="{{$data->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <img src="{{asset($data->image_banner)}}" alt="" style="width: 50px;height:50px;object-fit:contain">
          <br>
          <label>Change</label>
          <input type="file" name="image_banner" class="" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Start date</label>
          <input type="date" name="start_date" value="{{$data->start_date}}" class="form-control @error('start_date') is-invalid @enderror placeholder="">
        </div>
        <div class="form-group">
          <label for="">End date</label>
          <input type="date" name="end_date" value="{{$data->end_date}}"class="form-control @error('end_date') is-invalid @enderror"" placeholder="">
        </div>
        <div class="form-check">
            <input id="visible" class="form-check-input" type="checkbox" name="is_visible" value="true" {{$data->is_visible=='Y'?'checked':''}}>
            <label for="visible" class="form-check-label" >is_visible</label>
        </div>
        <button class="btn btn-success mt-3">Update</button>
    </form>
@endsection
