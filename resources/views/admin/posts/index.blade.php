@extends('admin/templates/base')

@section('title','Post')

@section('content')
    <div class="title mt-4">
        <h3>Post Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="add"><a href="{{route('admin.posts.create')}}" class="btn btn-outline-dark">Add</a></div>
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Type</th>
                <th>User</th>
                <th>is visible</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{strlen($post->content)>20? substr($post->content,0,20).'...' : $post->content}}</td>
                        <td>
                            <img src="{{asset($post->image_post)}}" alt="" style="width: 60px; height: 40px; object-fit:contain;">
                        </td>
                        <td>{{$post->type}}</td>
                        <td>{{$post->user_id}}</td>
                        <td>{{$post->is_visible}}</td>
                        <td class="action_mng">
                            <a href="{{route('admin.posts.edit',$post->id)}}"><i class="fa fa-edit"></i></a>
                            <form action="{{route('admin.posts.destroy',$post->id)}}" id="deleted_{{$post->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:document.getElementById('deleted_{{$post->id}}').submit()"><i class="fa fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
