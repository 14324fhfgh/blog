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
  <script src="static/admin/js/jquery.min.js"></script> 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
 <body>
 <h3>欢迎【{{session('deng')->name??''}}】登录,<a href="{{url('logout')}}">退出</a></h3>
    <h3>列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>名称</th>
         <th>状态</th>
		 <th>时间</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->uid}}</td>
         <td>{{$v->uname}}</td>
         <td>{{$v->static==1?'超级':'普通'}}</td>
         <td>{{date('Y-m-d H:i:s',$v->addtime)}}</td>
		 <td>
		 <a href="#" class="btn btn-info">编辑</a>
		 <a  href="#" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	  <tr>
   </tbody>
</table>
 </body>
</html>






