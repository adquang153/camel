@extends('admin/templates/base')

@section('title','Image')

@section('content')
    <div class="title mt-4">
        <h3>Image Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="add"><a href="{{route('images.create')}}" class="btn btn-outline-dark">Add</a></div>
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Images</th>
                <th>Product ID</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $img)
                    <tr>
                        <td>{{$img->id}}</td>
                        <td>
                            <img src="{{asset($img->image)}}" alt="" style="width: 60px; height: 40px; object-fit:contain;">
                        </td>
                        <td>{{$img->product_id}}</td>
                        <td class="action_mng">
                            <form action="{{route('images.destroy',$img->id)}}" id="deleted" method="post" class="d-inline">
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
