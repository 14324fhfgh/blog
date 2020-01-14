<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;

use App\Category;

use App\Goods;

use App\Mail\SendCode;

use App\Cart;

use DB;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Redis;

class Goodscontroller extends Controller
{
    public function sendemail()
    {
        Mail::to('1417677098@qq.com')->send(new SendCode());
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=Redis::incr('num');
        //dump($num);
        $pageSize=config('app.pageSize');
        $data=Goods::select('goods.*','brand.brand_name','category.cate_name')
        ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
        ->leftjoin('category','goods.cate_id','=','category.cate_id')
        ->paginate($pageSize);
        //dd($data);
        foreach( $data as $v){
            if($v->goods_imgs){
                $v->goods_imgs=explode('|',$v->goods_imgs);
            }
        }
        //dd($data);
        return view('admin.goods.index',['data'=>$data,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取品牌数据
        $brand=Brand::get();
        //获取分类数据
        $category=Category::get();
        $category=createTree($category);
        //dd($category);
        return view('admin.goods.create',['brand'=>$brand,'category'=>$category]);
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
        if($request->hasFile('goods_img')){
            $post['goods_img']=upload('goods_img');
        }
        //多文件上传
        if(isset($post['goods_imgs'])){
            $post['goods_imgs']=moreuploads('goods_imgs');
            $post['goods_imgs']=implode('|',$post['goods_imgs']);
        }
        //dd($post);
        $post['add_time']=time();
        $post['update_time']=time();
        $res=Goods::insert($post);
        if($res){
            return redirect('/goods');
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
        //访问量
        $res=Redis::setnx('num'.$id,1);
        if(!$res){
            Redis::incr('num'.$id);
        }
        $num=Redis::get('num'.$id);

        $goods=Goods::find($id);
        return view('admin.goods.show',['goods'=>$goods,'num'=>$num]);
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

    /*

    *添加购物车

    */
    public function addcart()
    {
        $goods_id=request()->goods_id;
        $buy_number=1;
        //判断用户是否登录
        if(!$this->isLogin()){
            //echo json_encode(['code'=>'00001','msg'=>'未登录,清登录']);
            //未登录存入cookie
           return $this->addCookiecart($goods_id,$buy_number);
        }
        //登录存入数据库
       return $this->addDBcart($goods_id,$buy_number);
        
    }
    
    public function addCookiecart($goods_id,$buy_number){
        $cart=Cookie::get('cart');
        dd($cart);
        $cart=json_decode($cart,true);
        dd($cart);
        $res=array_key_exists('cart_'.$goods_id,$cart);
        //dd($res);
        if($res){
            //如果之前购买过  则更改购买数量
            $res['cart_'.$goods_id]['buy_number']+=$buy_number;
            Cookie::queue('cart',json_encode($cart),30);
                echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;
        }
        //求商品信息
        $goods=Goods::where('goods_id',$goods_id)->first();





        //正常添加
        $data['cart_'.$goods_id]=[
            'goods_id'=>$goods_id,
            'buy_number'=>1,
            'goods_price'=>$goods->goods_price,
            'addtime'=>time(),
        ];
        $data=json_encode($data);
        $res=Cookie::queue('cart',$data,30);
        //dd($res);
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;
        }
    }
  
    public function addDBcart($goods_id,$buy_number){
        //求商品信息
        $goods=Goods::where('goods_id',$goods_id)->first();
        //判断库存
        if($goods->goods_number<$buy_number){
            echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
        }
        //获取当前登陆的id
        $user_id=session('deng')->id;
        //判断用户是否之前购买过
        //$cart=Cart::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->find();
        $cart=DB::table('cart')->where(['goods_id'=>$goods_id,'user_id'=>$user_id])->first();
        if($cart){
            //更新购买数量
            //判断库存
        if($cart->buy_number+$buy_number>$goods->goods_number){
            echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
        }
            $res=DB::table('cart')->where(['goods_id'=>$goods_id,'user_id'=>$user_id])->increment('buy_number');
            if($res) {echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;}
        }
        //没有购买 则 正常添加数据
        
        //dd($goods_price);
        $data=[
            'user_id'=>$user_id,
            'goods_id'=>$goods_id,
            'buy_number'=>1,
            'goods_price'=>$goods->goods_price,
            'addtime'=>time(),
        ];
        $res=Cart::create($data);
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'添加成功']);die;
        }
    }

    public function isLogin(){
        $user=session('admin');
        if(!$user){
            return false;
        }
        return true;
    }

}
