<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\BannerModel as Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $banner;

    public function __construct(BannerRepositoryInterface $bannerRepository){
        $this->banner = $bannerRepository;
    }

    public function index()
    {
        //
        $params = [
            'select' => ['id','title','image_banner','start_date','end_date','is_visible','created_at','updated_at'],
        ];
        $data = $this->banner->all($params);
        return view('admin/banner/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/banner/created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //
        $request->validate([
            'image_banner' => 'required',
        ]);
        // $path = $request->file('image_banner')->store('public/images/banner');
        // $data = Banner::create([
        //     'title' => $request->title,
        //     'image_banner' => Storage::url($path),
        //     'path' => $path,
        //     'start_date' => $request->start_date,
        //     'end_date' => $request->end_date,
        //     'is_visible' => $request->is_visible==true?'Y':'N',
        // ]);
        $data = $this->banner->create($request->all());
        if($data)
            return redirect('admin/banner')->with('success','Banner Created!');
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
        // $data =  Banner::find($id);
        $params = [
            'select' => ['id','title','image_banner','start_date','end_date','is_visible','created_at','updated_at'],
        ];
        $data = $this->banner->get($id,$params);
        return view('admin/banner/updated',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $data = $this->banner->update($id,$request->all());
        $success = 'Banner Updated!';
        if(!$data){
            $success = "Can't Updated!";
        }
        return redirect('admin/banner')->with('success','Banner Updated!');
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
        $data = $this->banner->delete($id);
        $success = "Banner Deleted!";
        if(!$data)
            $success = "Can't Deleted!";
        return redirect('admin/banner')->with('success',$success);
        
    }
}
