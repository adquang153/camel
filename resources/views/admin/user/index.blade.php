@extends('admin/templates/base')

@section('title','User')

@section('content')
    <div class="title mt-4">
        <h3>User Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="add"><a href="{{route('admin.user.create')}}" class="btn btn-outline-dark">Add</a></div>
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>User name</th>
                <th>Nick name</th>
                <th>Avatar</th>
                <th>email</th>
                <th>Number phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->nick_name}}</td>
                        <td>{{$user->avatar}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->number_phone}}</td>
                        <td>{{$user->address}}</td>
                        <td class="action_mng">
                            <a href="{{route('admin.user.edit',$user->id)}}"><i class="fa fa-edit"></i></a>
                            <form action="{{route('admin.user.destroy',$user->id)}}" id="deleted_{{$user->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:document.getElementById('deleted_{{$user->id}}').submit()"><i class="fa fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
