<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;

use App\Exam;

use DB;

use Illuminate\Support\Facades\Cache;

class Examcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cache::increment('static');
        $uid=request()->uid??'';
        $page=request()->page?:1;
        echo 'brand_'.$page;
        //$data=cache('brand_'.$page.'_'.$uid);
        $data=Redis::get('brand_'.$page.'_'.$uid);
        dump($data);
        //if(!$data){
        $where=[];
        if($uid){
            $where[]=['deng1.name','like',$uid];
        }
        $query=request()->all();
        //dd($query);
        $data=DB::table('exam')->where($where)->leftjoin('deng1','deng1.uid','=','exam.uid')->paginate(2);
        //dd($data);
        Cache::put('brand_'.$page.'_'.$uid,'$data',300);
       //}
       if(request()->ajax()){
        return view('admin.exam.index',['data'=>$data,'query'=>$query]);
    }
        return view('admin.exam.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam.create');
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
        //dd($post);die;
        $post['addtime']=time();
        $res=Exam::insert($post);
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
        // $name=session('deng1')
        // $uid=$res=Exam::destroy($id);
        // if($id==$uid){
        //     $res=Exam::destroy($id);
        // }else{
        //     echo '你不是此用户的主人';
        // }
       
        // if($res){
        //     if(request()->ajax()){
        //         echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        //     }
        //     return redirect('/index');
        // }
        $commont_model = new Exam();
        $data=Exam::where('uid',$id)->first();
        $session_uid=getuserld();
        if($data['uid']==$session_uid){
                 if((time()-$data->add_time)<1800){
                          $data->status=2;
                    if($data->delete()){
                        return[
                                   'status'=>200,
                                   'msg'=>'success',
                                   'data'=>[]
                            ];
                    }else{
                        return[
                                    'status'=>4,
                                    'msg'=>'删除失败',
                                    'data'=>[]
                        ];
                    }      
                 }else{
                     return[
                                     'status'=>3,
                                     'msg'=>'只能删除半小时内的评论',
                                     'data'=>[]
                     ];
                 }
        }
    }
}

