@extends('layouts/base')

@section('css')
<style>
    table{
        width: 100%;
    }
    thead{
        border-top: 3px solid #333;
        background: #efefef;
        border-radius: 3px;
    }
    td,th{
        padding: 5px 0;
        text-align: center;
    }
    
    .pay{
        width: 100%;
    }
    .pay > div{
        display: flex;
        align-items: baseline;
    }
    .pay h6{
        width: 80px;
    }
    .qty_item input{
        border: 1px solid #333;
        text-align: center;
        outline: none;
        border-radius: 4px;
        width: 40px;
        margin-right: 8px;
    }
    .qty_item a{
        text-decoration: none;
        border: 1px solid #333;
        padding:  1px 8px;
        border-radius: 4px;
        color: white;
        background: #585858;
        transition: all .3s;
    }
    .qty_item a:hover{
        background: #333;
    }
    tbody *{
        font-size: 14px;
        color: #333;
    }
    .pay h6{
        font-weight: bold;
    }
    .pay *{
        font-size: 14px;
    }
    .price, .price *{
        color: red;
        font-weight: bold;
    }
    .name a{
        color: #333;
        font-weight: bold;
        transition: all .2s;
    }
    .name a:hover{
        color: red;
        text-decoration: none;
    }
    .delete_all{
        width: 100%;
        text-align: right;
    }
    .delete_all a{
        display: inline-block;
        text-align: center;
        border-radius: 4px;
        width: 70px;
        padding: 5px 0;
        border: 1px solid #333;
        color: white;
        background: #585858;
        margin-bottom: 8px;
        margin-left: auto;
        font-size: 12px;
        transition: all .2s;
    }
    .delete_all a:hover{
        background: #333;
        text-decoration: none;
    }
</style>
@endsection


@section('content')
    <?php $cart = Session::get('cart') ?? null; ?>
    <div class="section_cart pt-80 pb-80">
        <div class="container">
            <div class="row w-100 px-3 m-0">
                <h2>Shopping Cart</h2>
            </div>
            <div class="row w-100 px-3 m-0 mt-4 cart_content">
            @if(isset($cart) && count($cart->items) > 0)
                <div class="delete_all">
                    <a href="javascript:delete_item(-1)" id="delete_-1" data-url="{{route('delete_cart',-1)}}">Delete all</a>
                </div>
                <table class="table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product name</th>
                            <th>Image product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->items as $items)
                        <tr id="cart_{{$items['id']}}">
                            <td>{{$items['id']}}</td>
                            <td class="name"><a href="{{route('product_detail',$items['id'])}}"> {{$items['title']}}</a></td>
                            <td><img src="{{$items['image_product']}}" alt="image product" style="width:80px;height:50px;object-fit:contain"></td>
                            <td class="price">{{number_format(intval($items['price']),0,',','.')}}<sup>đ</sup></td>
                            <td class="qty_item">
                                <input type="number" data-total="{{$items['id']}}" min="1" value="{{$items['qty']}}">    
                                <a href="javascript:total({{$items['id']}})">Edit</a>
                            </td>
                            <td class="price">{{number_format(intval($items['prices']),0,',','.')}}<sup>đ</sup></td>
                            <td>
                                <a href="javascript:delete_item({{$items['id']}})" id="delete_{{$items['id']}}" data-url="{{route('delete_cart',$items['id'])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pay mt-3">
                    <div>
                        <h6>Số lượng:</h6> 
                        <p class="total_cart">{{($cart->totalQty)}}</p>
                    </div>
                    <div>
                        <h6>Tổng giá:</h6>
                        <p class="total_price">{{($cart->totalPrice)}}<sup>đ</sup></p>
                    </div>
                
                </div>
            @else
                <div>
                    <h4>Cart is empty</h4>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function total(total_id){
        // let url = "{{route('edit_cart')}}";
        // let value_input = document.querySelector('input[data-total="' + total_id + '"]').value;
        // $.ajax({
        //     method:'get',
        //     url: url,
        //     data: {'_token':"{!! csrf_field() !!}",id:total_id,qty:value_input},
        //     dataType: 'JSON',
        //     success: function(res){
        //         alert(res);
        //     }
        // });
    }

    function delete_item(id){
        let url = document.querySelector('#delete_'+id).dataset.url;
        $.ajax({
            method: 'get',
            url: url,
            data:{},
            dataType:'JSON',
            success:function(res){
                document.querySelector('.total').innerHTML = res.count;
                if(res.count == 0){
                    document.querySelector('.cart_content').innerHTML = '<h4> Cart is empty </h4>';
                }else{
                    document.querySelector('#cart_'+ res.id).remove();
                    document.querySelector('.total_cart').innerHTML = res.total_cart;
                    document.querySelector('.total_price').innerHTML = res.total_price;
                    document.querySelector('.total').innerHTML = res.count;
                }
            },
            error:function(err){
                console.log(err);
            }
        });
    }
</script>
@endsection