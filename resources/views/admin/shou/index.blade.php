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
 <h3>欢迎【{{session('lu')->name??''}}】登录,<a href="{{url('logout')}}">退出</a></h3>
   <form>
      <input type="text" name="name" placeholder="请输入">
      <select name="cid">
          <option value="">请选择父级分类</option>
            <option>1907java</option>
            <option>1907phpA</option>
            <option>1907phpB</option> 
      </select>
      <button>搜索</button>
   </form> 
    <h3>文章列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>名称</th>
         <th>地理位置</th>
		 <th>面积</th>
		 <th>导购员</th>
         <th>性情</th>
         <th>图片</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->sname}}</td>
         <td>{{$v->di}}</td>
         <td>{{$v->mian}}</td>
         <td>{{$v->dao}}</td>
         <td>{{$v->content}}</td>
         <td>
         @if($v->imgs)
         @foreach ($v->imgs as $vv)
         <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="100"/>
         @endforeach
         @endif
         </td>
		 <td>
		 <a href="{{url('/edit/'.$v->id)}}" class="btn btn-info">编辑</a>
		 <a onclick="ajaxdestroy({{$v->id}})" href="javascript:void(0)" class="btn btn-danger">删除</a>
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



    //ajax删除
    function ajaxdestroy(id){
        if(!id){
             alert('请选择删除id');return;
         }
         $.get('/destroy/'+id,function(res){
            if(res.code=='00000'){
                alert(res.msg);
                location.reload(); 
            }
         },'json');
    }
 </script>
</html>






