@extends('admin/templates/base')

@section('title','Banner')

@section('content')
    <div class="title mt-4">
        <h3>Banner Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="add"><a href="{{route('banner.create')}}" class="btn btn-outline-dark">Add</a></div>
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Image Banner</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Is Visible</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $banner)
                    <tr>
                        <td>{{$banner->id}}</td>
                        <td>{{$banner->title}}</td>
                        <td>
                            <img src="{{asset($banner->image_banner)}}" alt="" style="width: 60px; height: 40px; object-fit:contain;">
                        </td>
                        <td>{{$banner->start_date}}</td>
                        <td>{{$banner->end_date}}</td>
                        <td>{{$banner->is_visible}}</td>
                        <td>
                            <a href="{{route('banner.edit',$banner->id)}}"><i class="fa fa-edit"></i></a>
                            <form action="{{route('banner.destroy',$banner->id)}}" id="deleted" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:document.getElementById('deleted').submit()"><i class="fa fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
