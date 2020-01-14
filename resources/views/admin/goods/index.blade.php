<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
 </head>
 <body>
 <h3>欢迎【{{session('deng')->name??''}}】登录,<a href="{{url('logout')}}">退出</a></h3>
   <form>
      <input type="text" name="name" placeholder="请输入">
      <button>搜索</button>
   </form> 
    <h3>商品列表</h3><h4>每页访问量:{{$num}}</h4></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>名称</th>
         <th>货号</th>
		 <th>品牌名称</th>
		 <th>分类名称</th>
         <th>添加时间</th>
         <th>相册列表</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->goods_id}}</td>
         <td>{{$v->goods_name}}</a></td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="100"/>{{$v->goods_sn}}</td>
         <td>{{$v->brand_name}}</td>
         <td>{{$v->cate_name}}</td>
         <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
         <td>
            @if($v->goods_imgs)
            @foreach ($v->goods_imgs as $vv)
              <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="100"/>
            @endforeach
            @endif
         </td>
		 <td>
         <a href="{{url('/goods/show/'.$v->goods_id)}}" class="btn btn-info">浏览</a>
		 <a href="{{url('/brand/edit/'.$v->goods_id)}}" class="btn btn-info">编辑</a>
		 <a href="{{url('/brand/del/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	  <tr>
	      <td colspan="4">{{$data->links()}}</td>
	  </tr>
   </tbody>
</table>
    <a href="{{url('create')}}">添加页面</a>
 </body>
 <!-- $(document).on('click','.pagination a',function(){
     var url=$(this).attr('href');
     $.get(url,function(res){
         $('tbody').html(res);
     });
     return false;
 }) -->
</html>






