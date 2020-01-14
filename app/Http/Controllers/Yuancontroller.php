<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Yuan;

class Yuancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yname=request()->yname??'';
        //dump($name);die();
        $where=[];
        if($yname){
            $where[]=['yname','like',"%$yname%"];
        } 
       $data=DB::table('yuan')->where($where)->orderBy('id','desc')->paginate(2);
       return view('admin.yuan.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加
    public function create()
    {
        return view('admin.yuan.create');

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
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }
        $res=DB::table('yuan')->insert($post);
        //dump($res);die();
        if($res){
            return redirect('/index');
        }else{
            return redirect('/create');
        }
    }
    

    //单文件上传
    public function upload($filename){
        if(request()->file($filename)->isValid()){
            //接收文件
            $photo=request()->file($filename);
            //上传文件
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('没有文件上传或者文件上传出错');
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
        $data=DB::table('yuan')->where('id',$id)->first();
		return view('admin.yuan.edit',['data'=>$data]);
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
        $post=$request->except('_token');
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }
        $res=DB::table('yuan')->where('id',$id)->update($post);
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
    public function destroy($id)
    {
        $res=DB::table('yuan')->where('id',$id)->delete();
		if( $res){
		    return redirect('/index');
		}
    }
}
