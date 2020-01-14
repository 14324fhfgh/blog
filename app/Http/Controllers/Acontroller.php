<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\A;

class Acontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name??'';
        $where=[];
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        $data=DB::table('brand')->where($where)->orderBy('brand_id','desc')->paginate(2);
        $query=request()->all();
        if(request()->all()){
          return view('admin.a.ajaxindex',['data'=>$data,'query'=>$query]);
        }      
        return view('admin.a.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.a.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'brand_name' => 'required|unique:brand|max:255',
             //'body' => 'required', 
        ],[
            'brand_name.required'=>'用户名必填',
            'brand_name.unique'=>'用户名已存在',
        ]);
        $post=request()->except(['_token']);
        if($request->hasFile('brand_logo')){
           $post['brand_logo']=$this->upload('brand_logo'); 
        }
        $res=DB::table('brand')->insert($post);
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
        //echo $id;die;
        $data=DB::table('brand')->where('brand_id',$id)->first();

        return view('admin.a.edit',['data'=>$data]);
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
        $post=request()->except(['_token']);
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo'); 
         }
        $res=DB::table('brand')->where('brand_id',$id)->update($post);
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
        //echo($id);die;
        $res=DB::table('brand')->where('brand_id',$id)->delete();
        if($res){
            return redirect('/index');
        }
    }
}
