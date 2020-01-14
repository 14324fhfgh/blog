<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wei;

use Validator;

class Weicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=request()->name??'';
        $cid=request()->cid;
        $where=[];
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        if($cid){
            $where[]=['cid','=',$cid];
        }
        $data=Wei::where($where)->orderBy('id','desc')->paginate(2);
        return view('admin.wei.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wei.create');
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
        // dd($post);
        $validator = Validator::make($post, [
            'wname' => 'required|unique:wei|max:255|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            // 'wname' => [
            //     'required',
            //     'unique:wei',
            //     'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u'
            // ],
            
            'cid' => 'required',
            'xing' => 'required',
            'shi' => 'required'
         ],
        [
                 'wname.required'=>'用户名必填',
                 'wname.regex'=>'用户名需要中文字母下划线组成',
                 'wname.unique'=>'用户名已存在',
                 'cid.required'=>'分类必填',
                 'xing.required'=>'重要性必填',
                 'shi.required'=>'是否显示必填',
             ]);
        
        if ($validator->fails()) { 
         
           return redirect('/create') 
           ->with('data',$post)
           ->withErrors($validator) 
           ->withInput();
        }
        if(request()->hasFile('img')){
         
            $post['img']=$this->upload('img');
        }
        $post['add_time']=time();
        $res=Wei::insert($post);
        
        if($res){
            return redirect('/index');
        }
    }


    public function upload($filename){
        if (request()->file($filename)->isValid()) { 
            $photo = request()->file($filename);
            $store_result=$photo->store('uploads');
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
        $data=Wei::find($id);
		return view('admin.wei.edit',['data'=>$data]);
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
        if($request->hasFile('img')){
            $post['img']=$this->upload('img');
        }
        $res=Wei::where('id',$id)->update($post);
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
        $res=Wei::destroy($id);
		if( $res){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
            }
		    return redirect('/index');
		}
    }
}
