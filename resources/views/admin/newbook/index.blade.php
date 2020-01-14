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
  
    <h3>分类列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>名称</th>
         <th>父级分类</th>
		 <th>新闻作者</th>
         <th>新闻操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->new_id}}</td>
         <td>{{$v->new_name}}</td>
         <td>@php echo str_repeat('|--',$v->level);@endphp {{$v->new_name}}</td>
         <td>{{$v->new_zuo}}</td>
		 <td>
		 <a href="{{url('/edit/'.$v->cate_id)}}" class="btn btn-info">编辑</a>
		 <a href="{{url('/destroy/'.$v->cate_id)}}" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	 
   </tbody>
</table>
      <tr>
	      <td colspan="4">{{$res->links()}}</td>
	  </tr>
    <a href="{{url('create')}}">添加页面</a>
 </body>
</html>

