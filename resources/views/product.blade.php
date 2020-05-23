@extends('layouts/base')
@section('css')
<link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@endsection
@section('content')
<section class="product pt-80 pb-80">
    <div class="row w-100 px-4 m-0">
        <div class="col-md-9">
            <div class="title_product">
                <h2>{{$title->title}}</h2>
            </div>
            <div class="total">
                <p>Show all {{$data->total()}} Result</p>
            </div>
            <div class="product-parent">
                <ul class="list-product">
                    @foreach($data as $item)
                    <li class="product-item">
                        <div class="item">
                            <div class="item-image">
                                <img src="{{$item->image_product}}" alt="">
                                <div class="link">
                                    <a href="{{route('product_detail',$item->id)}}">Detail</a>
                                </div>
                            </div>
                            <div class="description">
                                <h6><a href="{{route('product_detail',$item->id)}}">{{$item->title}}</a></h6>
                                <p>{{number_format(intval($item->price),0,',','.')}}<sup>đ</sup></p>
                            </div>
                            <ul class="action">
                                <li class="like"><span><i class="fas fa-thumbs-up"></i></span> {{$item->likes??0}}</li>
                                <li class="comment"><span><i class="fa fa-comment-dots"></i></span> {{$item->comments??0}}</li>
                                <li class="user">zxzcx</li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            {{$data->links()}}
        </div>
        <div class="col-md-3">
            @include('layouts.sidebar')
        </div>
    </div>
</section>
@endsection