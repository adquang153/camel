<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AboutUsRequest;
use App\Repositories\AboutUs\AboutUsRepositoryInterface;

class AboutUsController extends Controller
{

    protected $aboutUs;

    public function __construct(AboutUsRepositoryInterface $aboutUs){
        $this->aboutUs = $aboutUs;
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
            'select'=>['id','title','content','image','is_visible'],
        ];
        $data = $this->aboutUs->all($params);
        return view('admin/about_us/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/about_us/created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutUsRequest $request)
    {
        //
        $request->validate([
            'image' => 'required',
        ]);
        $data = $this->aboutUs->create($request->all());
        if($data)
            return redirect('admin/about_us')->with('success','About Created!');
        return back()->with('error',"Can't Created!");
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
            'select' => ['id','title','content','image','is_visible'],
        ];
        $data = $this->aboutUs->get($id,$params);
        return view('admin/about_us/updated',compact('data'));
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
        $data = $this->aboutUs->update($id,$request->all());
        $success = 'About Updated!';
        if(!$data){
            $success = "Can't Updated!";
        }
        return redirect('admin/about_us')->with('success','About Updated!');
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
        $data = $this->aboutUs->delete($id);
        $success = "About Deleted!";
        if(!$data)
            $success = "Can't Deleted!";
        return redirect('admin/about_us')->with('success',$success);
    }
}
