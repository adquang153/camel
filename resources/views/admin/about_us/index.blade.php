@extends('admin/templates/base')

@section('title','About Us')

@section('content')
    <div class="title mt-4">
        <h3>About Us Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="add"><a href="{{route('admin.about_us.create')}}" class="btn btn-outline-dark">Add</a></div>
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Is Visible</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $about)
                    <tr>
                        <td>{{$about->id}}</td>
                        <td>{{$about->title}}</td>
                        <td>{{$about->content}}</td>
                        <td>
                            <img src="{{asset($about->image)}}" alt="" style="width: 60px; height: 40px; object-fit:contain;">
                        </td>
                        <td>{{$about->is_visible}}</td>
                        <td class="action_mng">
                            <a href="{{route('admin.about_us.edit',$about->id)}}"><i class="fa fa-edit"></i></a>
                            <form action="{{route('admin.about_us.destroy',$about->id)}}" id="deleted" method="post" class="d-inline">
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