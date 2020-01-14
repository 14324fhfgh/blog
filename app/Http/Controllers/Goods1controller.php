<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Goods;

use App\Category;

//use Validator;

class Goods1controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Goods::orderBy('goods_id','desc')->join('category','category.cate_id','=','goods.cate_id')->paginate(2);
        if(request()->ajax()){
            return view('admin.goods.ajaxindex',['data'=>$data]);
        }
        return view('admin.goods1.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post=Category::get();
        $data=createTree($post);
        return view('admin.goods1.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$post=request()->expect(['_token']);
        $post=$request->except(['_token']);
        // $validator = Validator::make($post, [
        //     'goods_name' => 'required|unique:goods|max:255|regex:/^\w+s/',
        //    //'body' => 'required',
        // //    'brand_name' => [
        // //        'required',
        // //        'unique:brand',
        // //        'max:255',
        // //        'regex:/^\w+s/',
        // //     ],
        // ],[
        //          'goods_name.required'=>'用户名必填',
        //          'goods_name.required'=>'用户名需要中文字母下划线组成',
        //          'goods_name.unique'=>'用户名已存在',
        //      ]);
        // if ($validator->fails()) { 
        //    return redirect('/create') 
        //    ->with('data',$post)
        //    ->withErrors($validator) 
        //    ->withInput();
        // }
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }
        $post['add_time']=time();
        $res=Goods::insert($post);
        //dump($res);die();
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
        $data=Goods::find($id);
        return view('admin.goods.edit',['data'=>$data]);
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
        $res=Goods::find($id);
        if($res!==false){
            return redirect('/index');
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
        $res=Goods::destroy($id);
        if($res){
            return redirect('/index');
        }
    }
}
