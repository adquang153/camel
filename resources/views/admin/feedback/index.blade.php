@extends('admin/templates/base')

@section('title','Feedback')

@section('content')
    <div class="title mt-4">
        <h3>Feedback Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>title</th>
                <th>Content</th>
                <th>User</th>
                <th>is_visible</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $feedback)
                    <tr>
                        <td>{{$feedback->id}}</td>
                        <td>{{$feedback->title}}</td>
                        <td>{{$feedback->content}}</td>
                        <td>{{$feedback->user_id}}</td>
                        <td>{{$feedback->is_visible}}</td>
                        <td class="action_mng">
                            <form action="{{route('admin.feedback.destroy',$feedback->id)}}" id="deleted" method="post" class="d-inline">
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
