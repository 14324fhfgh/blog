<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

use App\Good;

class Goodcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page=request()->page?:1;
        $data=cache('data_'.$page);
        echo 'data_'.$page;
        dump($data);
        if(!$data){
        $data=Good::orderBy('good_id','desc')->paginate(2);
        cache(['data_'.$page=>$data],30);
        }
        if(request()->ajax()){
            return view('admin.good.ajaxindex',['data'=>$data]);
        }
        return view('admin.good.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.good.create');
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
        $post['add_time']=time();
        $res=Good::insert($post);
        if($res){
            return redirect('/index');
        }else{
            return redirect('/create');
        }
    }


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
        $res=Good::destroy($id);
        if($res){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
            }
            return redirect('/index');
        }
    }
    public function checkOnly(){
        $good_name=request()->good_name;
        $where=[];
        if($good_name){
            $where['good_name']=$good_name;
        }
        $count=Good::where($where)->count();
        echo intval($count);
    }
}
