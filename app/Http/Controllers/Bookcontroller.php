<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

use Illuminate\Support\Facades\Cache;

class Bookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bname=request()->bname??'';
        $page=request()->page?:1;
        echo 'brand_'.$page;
        $data=cache('data_'.$page.'_'.$bname);
        if(!$data){
        $where=[];
        if($bname){
            $where[]=['bname','like',"%$bname%"];
        }
        
        $data=Book::where($where)->orderBy('id','desc')->paginate(2);
        Cache::put('brand_'.$page.'_'.$bname,'$data',30);
    }
        //$query=request()->all();
        return view('admin.book.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // showMsg(1,'Hello World!');
        return view('admin.book.create');
        
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
            'bname' => 'required|unique:book|max:255',
            'zuo' => 'required|unique:book|max:255',
             //'body' => 'required', 
        ],[
            'bname.required'=>'用户名必填',
            'bname.unique'=>'用户名已存在',
            'zuo.required'=>'作者必填',
            'zuo.required'=>'作者已存在',
        ]);
        $post=request()->except(['_token']);
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }
        $res=Book::insert($post);
        dump($res);
        if($res){
            return redirect('/index');
        }else{
            return redirect('/create');
        }
    }



    public function upload($filename){
        if ( request()->file($filename)->isValid()) { 
            $photo = request()->file($filename);
            $store_result = $photo->store('uploads');
            return $store_result; 
            }
            exit('未获取到上传文件或上传过程出错'); 
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
    }
}
