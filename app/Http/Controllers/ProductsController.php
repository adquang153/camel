<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\Products\ProductsRepositoryInterface;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class ProductsController extends Controller
{
    protected $product;
    protected $pro_type;
    protected $user;

    public function __construct(ProductsRepositoryInterface $product, ProductTypeRepositoryInterface $pro_type, UserRepositoryInterface $user){
        $this->product = $product;
        $this->pro_type = $pro_type;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $params = [
            'select' => ['id','title','content','image_product','price','type','user_id','is_visible','created_at','updated_at'],
        ];
        $data = $this->product->all($params);
        return view('admin/products/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $paramsPT = [
            'select' => ['id','title'],
        ];
        $paramsUser = [
            'select' => ['id','nick_name'],
        ];
        $user = $this->user->all($paramsUser);
        $type = $this->pro_type->all($paramsPT);
        return view('admin/products/created', compact('type','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $request->validate([
            'image_product' => 'required',
        ]);
        $result = $this->product->create($request->all());
        if($result)
            return redirect('admin/products')->with('success','Product Created!');
        return redirect('admin/products')->with('success','Can\'t Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $params = [
            'select' => ['id','title','content','image_product','price','type','user_id','is_visible','created_at','updated_at'],
        ];
        $data = $this->product->get($id,$params);
        $type = $this->pro_type->all();
        $paramsUser = [
            'select' => ['id','nick_name'],
        ];
        $user = $this->user->all($paramsUser);
        return view('admin/products/updated', compact(['data','type','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $result = $this->product->update($id, $request->all());
        if($result)
            return redirect('admin/products')->with('success','Product Updated');
        return redirect('admin/products')->with('success','Can\'t Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = $this->product->delete($id);
        if($data)
            return redirect('admin/products')->with('success','Product Deleted!');
        return redirect('admin/products')->with('success','Can\'t Deleted!');
    }
}
