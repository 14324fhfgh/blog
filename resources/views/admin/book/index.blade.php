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
  <script src="/static/admin/js/jquery.min.js"><script> 
 </head>
 <body>
   <form>
      <input type="text" name="bname" placeholder="请输入">
      <button>搜索</button>
   </form> 
    <h3>图书列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>图书名称</th>
         <th>图书作者</th>
		 <th>图书价格</th>
		 <th>图书封面</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->bname}}</td>
         <td>{{$v->zuo}}</td>
         <td>{{$v->price}}</td>
		 <td>
		 <a href="" class="btn btn-info">编辑</a>
		 <a href="" class="btn btn-danger">删除</a>
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

</html>






