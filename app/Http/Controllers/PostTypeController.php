<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostType\PostTypeRepositoryInterface;

class PostTypeController extends Controller
{

    protected $postType;

    public function __construct(PostTypeRepositoryInterface $postType){
        $this->postType = $postType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = $this->postType->all();
        
        return view('admin/post_type/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/post_type/created');
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
            'title' => 'required|max:100',
            'content' => 'required'
        ]);
        $data  = $this->postType->create($request->all());
        return redirect('admin/post_type')->with('success',$data?'Post Type Created!':'Can\'t Created');
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
        $data = $this->postType->get($id);
        return view('admin/post_type/updated',compact('data'));
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
        $data = $this->postType->update($id, $request->all());
        return redirect('admin/post_type')->with('success',$data?'Post Type Updated!':'Can\'t Updated!');
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
        $result = $this->postType->delete($id);
        return redirect('admin/post_type')->with('success',$result?'Post Type Deleted!':'Can\'t Deleted!');
    }
}
