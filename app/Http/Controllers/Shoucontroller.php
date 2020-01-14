<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shou;

class Shoucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $pageSize=config('app.pageSize');
        $data=Shou::paginate($pageSize);
        foreach( $data as $v){
            if($v->imgs){
                $v->imgs=explode('|',$v->imgs);
            }
        }
        //dd($data);die;
        return view('admin.shou.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shou.create');
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
        if ($request->hasFile('img')){
           $post['img']=upload('img');
        } 
        //dd($post);
        //多文件
        if($post['imgs']){
            $post['imgs']=moreuploads('imgs');
            $post['imgs']=implode('|',$post['imgs']);
        }
        //dd($post);   
        $res=Shou::insert($post);
        if($res){
            return redirect('/index');
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
        $res=Shou::destroy($id);
        if($res){
            if(request()->ajax()){
                
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
            }
            return redirect('/index');
        }
    }
}
