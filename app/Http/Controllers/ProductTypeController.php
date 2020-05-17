<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;

class ProductTypeController extends Controller
{

    protected $pro_type;
    
    public function __construct(ProductTypeRepositoryInterface $pro_type){
        $this->pro_type = $pro_type;
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
            'select' => ['id','title','image'],
        ];
        $data = $this->pro_type->all($params);
        return view('admin/product_type/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/product_type/created');
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
            'title'=>'required|max:100',
            'image'=>'required'
        ]);
        
        $data = $this->pro_type->create($request->all());
        if($data)
            return redirect('admin/product_type')->with('success','Product Type Created!');
        return redirect('admin/product_type')->with('success','Can\'t Product Type Created!');
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
            'select' => ['id','image','title']
        ];
        $data = $this->pro_type->get($id,$params);
        return view('admin/product_type/updated',compact('data'));
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
        $request->validate([
            'title'=>'required|max:50',
        ]);
        $result = $this->pro_type->update($id,$request->all());
        if($result)
            return redirect('admin/product_type')->with('Product Type Updated!');
        return redirect('admin/product_type')->with('Can\'t Product Type Updated!');

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
        $result = $this->pro_type->delete($id);
        if($result)
            return redirect('admin/product_type')->with('success','Product Type Deleted!');
        return redirect('admin/product_type')->with('success','Can\'t Product Type Deleted!');
    }
}
