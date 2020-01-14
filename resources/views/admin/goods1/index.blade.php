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
 <h3>欢迎【{{session('deng')->name}}】登录,<a href="{{url('logout')}}">退出</a></h3>
   <form>
      <input type="text" name="goods_name" placeholder="请输入">
      <button>搜索</button>
   </form> 
    <h3>品牌列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>商品名称</th>
         <th>分类id</th>
		 <th>商品状态</th>
		 <th>商品价格</th>
         <th>商品内容</th>
         <th>商品时间</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->goods_id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->goods_name}}</td>
         <td>{{$v->cate_id}}</td>
         <td>{{$v->goods_static==1?'上架':'下架'}}</td>
         <td>{{$v->goods_script}}</td>
         <td>{{$v->goods_desc}}</td>
         <td>{{$v->add_time}}</td>
		 <td>
		 <a href="{{url('/edit/'.$v->goods_id)}}" class="btn btn-info">编辑</a>
		 <a href="{{url('/destroy/'.$v->goods_id)}}" class="btn btn-danger">删除</a>
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
 <script>
      $(document).on('click','.pagination a',function(){
     var url=$(this).attr('href');
     $.get(url,function(res){
         $('tbody').html(res);
     });
     return false;
 });
 </script>
 
</html>






