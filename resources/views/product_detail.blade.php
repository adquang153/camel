@extends('layouts.base')
@section('css')
<link rel="stylesheet" href="{{asset('css/product.css')}}">
@endsection
@section('content')
<section class="detail pt-80">
    <div class="container_camel">
        <div class="row w-100 m-0 p-0 row_product">
            <div class="product_head">
                <h4>{{$data->title}}</h4>
            </div>
            <div class="product_content">
                <div class="product_image">
                    <img src="{{asset($data->image_product)}}" alt="">
                </div>
                <div class="form_product mt-4">
                    <form action="{{route('add_cart',$data->id)}}" method="get">
                        <input type="number" name="quantity" min="1" value="1" required>
                        <button type="submit">Add to cart</button>
                    </form>
                </div>
            </div>
            <div class="product_descript mt-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#desc">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#review">Reviews<sup>0</sup></a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="desc">
                        <div class="name">
                            <h6>Name:</h6>
                            <p>{{$data->title}}</p>
                        </div>
                        <div class="price">
                            <h6>Price:</h6>
                            <p>{{number_format(intval($data->price),0,',','.')}}</p>
                        </div>
                        <div class="user">
                            <h6>Posted:</h6>
                            <p>{{$data->nick_name}}</p>
                        </div>
                        <div class="content">
                            <p>{{$data->content}}</p>
                        </div>
                        <ul class="action">
                            <li class="like"><span><i class="fas fa-thumbs-up"></i></span> {{$item->likes??0}}</li>
                            
                        </ul>
                    </div>
                    <div class="tab-pane container fade" id="review">
                        <div class="comment">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, debitis ducimus. Culpa veniam architecto accusamus tempora adipisci laboriosam ad doloribus numquam asperiores dignissimos deleniti voluptatem minus, voluptatibus perspiciatis enim? In.
                        </div>
                    </div>
                </div>
            </div>
            <!-- end description -->
            <div class="leave">

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
@endsection