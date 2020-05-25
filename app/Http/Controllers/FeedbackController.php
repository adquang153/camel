<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Feedback\FeedbackRepositoryInterface;

class FeedbackController extends Controller
{

    protected $feedback;

    public function __construct(FeedbackRepositoryInterface $feedback){
        $this->feedback = $feedback;
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
            'select' => ['id','title','content','user_id','is_visible'],
        ];
        $data = $this->feedback->all($params);
        return view('admin/feedback/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // $result = $this->feedback->delete($id);
        // $success = "Feedback Deleted!";
        // if(!$result)
        //     $success = "Can't Deleted!";
        // return redirect('admin/feedback')->with('success',$success);
        echo $id;
    }
}
