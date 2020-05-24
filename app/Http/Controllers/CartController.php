<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Products\ProductsRepositoryInterface;

class CartController extends Controller
{
    //
    protected $product;
    public function __construct(ProductsRepositoryInterface $product){
        $this->product = $product;
    }
    public function addCart(Request $request, $id){
        $product = $this->product->get($id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;

        $cart = new Cart($oldCart);

        $cart->add($product->only(['id','title','price','image_product']), intval($request->get('quantity')));

        $request->session()->put('cart',$cart);

        $cart = Session::get('cart');
        return redirect('/cart');
    }

    public function deleteCart($id){
        if($id == -1){
            Session::forget('cart');
            return json_encode(['count'=>0]);
        }
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($cart);
        if($cart){
            $cart->delete($id);
        }
        Session::put('cart',$cart);
        $count = count($cart->items);
        return json_encode(['id'=>$id,'total_cart'=>$cart->totalQty,'total_price'=>$cart->totalPrice,'count'=>$count]);
    }
    public function editCart(Request $request){
        $cart = Session::has('cart') ? Session::get('cart') : null;
        if($cart){
            $cart->edit($request->id,$request->qty);
        }
        Session::put('cart',$cart);
        return json_encode(array_merge($cart->items[$request->id],['total_cart'=>$cart->totalQty,'total_price'=>$cart->totalPrice]));
    }
    public function getCart(){
        return view('/cart');
    }
}
