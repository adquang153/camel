<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\PostType\PostTypeRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\PostRequest;
class PostsController extends Controller
{

    protected $post;
    protected $postType;
    protected $user;

    public function __construct(PostsRepositoryInterface $post, PostTypeRepositoryInterface $postType, UserRepositoryInterface $user){
        $this->post = $post;
        $this->postType = $postType;
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
            'select' => ['id','title','image_post','type','user_id','is_visible','content','created_at','deleted_at'],
        ];
        $data = $this->post->all($params);
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
        $paramsPT = [
            'select' => ['id','title'],
        ];
        $paramsUser = [
            'select' => ['id','nick_name'],
        ];
        $type = $this->postType->all($paramsPT);
        $user = $this->user->all($paramsUser);
        return view('admin/posts/created',compact('type','user'));
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
        $params = [
            'select' => ['id','title','image_post','type','user_id','created_at','deleted_at'],
        ];
        $data = $this->post->get($id,$params);
        $type = $this->postType->all();
        $paramsUser = [
            'select' => ['id','nick_name'],
        ];
        $user = $this->user->all($paramsUser);
        return view('admin/posts/updated',compact(['data','type','user']));
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
