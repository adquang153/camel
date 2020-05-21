<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Images\ImagesRepositoryInterface;
use App\Repositories\Products\ProductsRepositoryInterface;

class ImagesController extends Controller
{
    protected $images;
    protected $products;

    public function __construct(ImagesRepositoryInterface $images, ProductsRepositoryInterface $products){
        $this->images = $images;
        $this->products = $products;
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
            'select' => ['id','image','product_id','created_at','updated_at'],
        ];
        $data = $this->images->all($params);
        return view('admin/images_product/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $where = [
            'is_visible' => 'Y',
        ];
        $products = $this->products->all($where);
        return view('admin/images_product/created',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => 'required',
            'product_id' => 'required'
        ]);
        $result = $this->images->create($request->all());
        return redirect('admin/images')->with('success',$result?'Image Product Created!':'Can\'t Created!');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $result = $this->images->delete($id);
        return redirect('admin/images')->with($result?'Image Deleted!':'Can\'t Image!');
    }
}
