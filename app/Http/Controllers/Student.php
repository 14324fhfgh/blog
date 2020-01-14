<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Student extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('brand1')->paginate(2);

        return view('admin.student.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加
    public function create()
    {
        return view('admin.student.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except(['_token']);
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }
        $res=DB::table('brand1')->insert($post);
        if($res){
            return redirect('/index');
        }else{
            return redirect('/create');
        }
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
        $data=DB::table('brand1')->where('brand_id',$id)->first();
        return view('admin.student.edit',['data'=>$data]);
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
        $post=$request->except(['_token']);
        $res=DB::table('brand1')->where('brand_id',$id)->update($post);
        if($res!==false){
            return redirect('/index');
        }else{
            return redirect('/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $res=DB::table('brand1')->where('brand_id',$id)->delete();
    
        if($res){
            return redirect('/index');
        }
    } 
}

