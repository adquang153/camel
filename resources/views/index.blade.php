@extends('layouts/base')

@section('css')
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')

<section class="section_banner">
    <div class="banner">
        @foreach($banner as $ban)
            <div class="banner_item">
                <img src="{{asset($ban->image_banner)}}" alt="slide banner">
                <div class="banner_title">
                    <p>{{$ban->title}}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="product_type">
    <div class="p-3">
        <div class="type_parent row">
            <div class="col-md-6">
                <div class="type_image">
                    <img src="{{$productType[0]->image}}" alt="">
                    <a href="{{route('product_type',$productType[0]->id)}}" class="type_content">
                        <p>{{$productType[0]->title}}</p>
                    </a>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="type_image">
                            <img src="{{$productType[1]->image}}" alt="">
                            <a href="{{route('product_type',$productType[1]->id)}}" class="type_content">
                                <p>{{$productType[1]->title}}</p>
                            </a>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6 pt-3">
                        <div class="type_image">
                            <img src="{{$productType[2]->image}}" alt="">
                            <a href="{{route('product_type',$productType[2]->id)}}" class="type_content">
                                <p> {{$productType[2]->title}}</p>
                            </a>
                        </div>
                        
                    </div>
                    <!-- end col -->
                    <div class="col-md-6 pt-3">
                        <div class="type_image">
                            <img src="{{$productType[3]->image}}" alt="">
                            <a href="{{route('product_type',$productType[3]->id)}}" class="type_content">
                                 <p>{{$productType[3]->title}}</p>
                            </a>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end col -->
        </div>
        <!-- end type_parent row -->
    </div>
    <!-- end padding -->
</section>

@endsection

@section('scripts')
<script src="{{asset('js/slick.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.banner').slick({
            dots:true,
        });
    });
</script>
@endsection