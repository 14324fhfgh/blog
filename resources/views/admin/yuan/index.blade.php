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
   <form>
      <input type="text" name="yname" placeholder="请输入">
      <button>搜索</button>
   </form> 
    <h3>员工列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>员工名称</th>
         <th>员工号</th>
         <th>员工部门</th>
		 <th>员工操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="100"/>{{$v->yname}}</td>
         <td>{{$v->yhao}}</td>
         <td>{{$v->bid}}</td>
		 <td>
		 <a href="{{url('/yuan/edit/'.$v->id)}}" class="btn btn-info">编辑</a>
		 <a href="{{url('/yuan/del/'.$v->id)}}" class="btn btn-danger">删除</a>
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






