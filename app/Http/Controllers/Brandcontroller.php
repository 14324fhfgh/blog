<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Brand;

use App\Http\Requests\StoreBrandPost;

use Validator;

use Illuminate\Support\Facades\Cache;

class Brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name??'';
        $page=request()->page?:1;
        echo 'brand_'.$page;
        $data=cache('brand_'.$page.'_'.$name);
        if(!$data){
        //dump($name);die();
        $where=[];
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        //$data=DB::table('brand')->orderBy('brand_id','desc')->paginate(2);
        //dd($data);
        $query=request()->all();
        $data=Brand::where($where)->orderBy('brand_id','desc')->paginate(2);
        Cache::put('brand_'.$page.'_'.$name,'$data',30);
    }
        if(request()->ajax()){
            return view('admin.index',['data'=>$data,'query'=>$query]);
        }
		return view('admin.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加
    public function create()
    {
        return view('admin.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //public function store(StoreBrandPost $request)
    {
        //第一种验证
        // $validatedData = $request->validate([ 
        //     'brand_name' => 'required|unique:brand|max:255',
        //      //'body' => 'required',
        // ],[
        //     'brand_name.required'=>'用户名必填',
        //     'brand_name.unique'=>'用户名已存在',
        // ]);
        $post=$request->except(['_token']);
        //第三种
        $validator = Validator::make($post, [
            'brand_name' => 'required|unique:brand|max:255|regex:/^\w+s/',
           //'body' => 'required',
        //    'brand_name' => [
        //        'required',
        //        'unique:brand',
        //        'max:255',
        //        'regex:/^\w+s/',
        //     ],
        ],[
                 'brand_name.required'=>'用户名必填',
                 'brand_name.required'=>'用户名需要中文字母下划线组成',
                 'brand_name.unique'=>'用户名已存在',
             ]);
        if ($validator->fails()) { 
           return redirect('/create') 
           ->with('data',$post)
           ->withErrors($validator) 
           ->withInput();
        }
        //dump($post);
        //文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=upload('brand_logo');
        }
        //dd($post);
        //$res=DB::table('brand')->insert($post);
        //ORM操作
        $res=Brand::insert($post);
        //dd($res);
        if($res){
            return redirect('/brand');
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
        //$data=DB::table('brand')->where('brand_id',$id)->first();
        $data=Brand::find($id);
		return view('admin.edit',['data'=>$data]);
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
        //$res=DB::table('brand')->where('brand_id',$id)->update($post);
        //$res=Brand::where('brand_id',$id)->update($post);
        $brand=Brand::find($id);
        $brand->brand_name=$post['brand_name'];
        $brand->brand_url=$post['brand_url'];
        $brand->brand_logo=$post['brand_logo'];
        $brand->brand_desc=$post['brand_desc'];
        $res=$brand->save();
		if( $res!== false){
		    return redirect('/brand');
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
        //$res=DB::table('brand')->where('brand_id',$id)->delete();
        $res=Brand::destroy($id);
		if( $res){
		    return redirect('/index');
		}
    }
}
