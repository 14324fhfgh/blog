<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Newbook;

use Validator;

class Newbookcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Newbook::get();
        //dd($post);
        $data=createTree($post);
        //dd($data);
        $res=Newbook::orderBy('new_id','desc')->paginate(2);
        return view('admin.newbook.index',['data'=>$data,'res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post=Newbook::get();
        //dd($post);
        $data=createTree($post);
        //dd($data);
        return view('admin.newbook.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=request()->except(['_token']);
        $validator = Validator::make($post, [
            'new_name' => 'required|unique:newbook|max:255|regex:/^\w+s/',
           //'body' => 'required',
        //    'brand_name' => [
        //        'required',
        //        'unique:brand',
        //        'max:255',
        //        'regex:/^\w+s/',
        //     ],
        ],[
                 'new_name.required'=>'用户名必填',
                 'new_name.required'=>'用户名需要中文字母下划线组成',
                 'new_name.unique'=>'用户名已存在',
             ]);
        if ($validator->fails()) { 
           return redirect('/create') 
           ->with('data',$post)
           ->withErrors($validator) 
           ->withInput();
        }
        $res=Newbook::insert($post);
        //dd($res);
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
