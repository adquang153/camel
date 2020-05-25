@extends('admin/templates/base')

@section('title','Product')

@section('content')
    <div class="title mt-4">
        <h3>Product Manager</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="add"><a href="{{route('admin.products.create')}}" class="btn btn-outline-dark">Add</a></div>
    <table class="table table-light table-striped table-hover mt-4">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Prices</th>
                <th>Type</th>
                <th>User</th>
                <th>is visible</th>
                <th>Action</th>
            </tr>
            @if($data)
                @foreach($data as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{strlen($product->content)>20? substr($product->content,0,20).'...' : $product->content}}</td>
                        <td>
                            <img src="{{asset($product->image_product)}}" alt="" style="width: 60px; height: 40px; object-fit:contain;">
                        </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->user_id}}</td>
                        <td>{{$product->is_visible}}</td>
                        <td class="action_mng">
                            <a href="{{route('admin.products.edit',$product->id)}}"><i class="fa fa-edit"></i></a>
                            <form action="{{route('admin.products.destroy',$product->id)}}" id="deleted_{{$product->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:document.getElementById('deleted_{{$product->id}}').submit()"><i class="fa fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
