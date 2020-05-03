<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\PostType\PostTypeRepositoryInterface;
use App\Http\Requests\PostRequest;
class PostsController extends Controller
{

    protected $post;
    protected $postType;

    public function __construct(PostsRepositoryInterface $post, PostTypeRepositoryInterface $postType){
        $this->post = $post;
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
        $data = $this->post->all();
        return view('admin/posts/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type = $this->postType->all();
        return view('admin/posts/created',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $request->validate([
            'image_post' => 'required',
        ]);
        $result = $this->post->create($request->all());
        return redirect('admin/posts')->with('success',$result?'Post Created!':'Can\'t Created!');
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
        $data = $this->post->get($id);
        $type = $this->postType->all();
        return view('admin/posts/updated',compact(['data','type']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
        $result = $this->post->update($id, $request->all());
        return redirect('admin/posts')->with('success',$result?'Post Updated!':'Can\'t Updated!');
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
        $result = $this->post->delete($id);
        return redirect('admin/posts')->with('success',$result?'Post Deleted!':'Can\'t Deleted!');
    }
}
