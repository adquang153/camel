@extends('admin/templates/base')

@section('title','Banner')

@section('content')
    <div class="title mt-4">
        <h3>Post Type Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="add"><a href="{{route('admin.post_type.create')}}" class="btn btn-outline-dark">Add</a></div>
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->content}}</td>
                        <td class="action_mng">
                            <a href="{{route('admin.post_type.edit',$value->id)}}"><i class="fa fa-edit"></i></a>
                            <form action="{{route('admin.post_type.destroy',$value->id)}}" id="deleted_{{$value->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:document.getElementById('deleted_{{$value->id}}').submit()"><i class="fa fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
