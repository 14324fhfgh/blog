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
 <h3>欢迎【{{session('deng1')->name}}】登录,<a href="{{url('logout')}}">退出</a></h3>
 
      
      <p>
      <h3>留言板</h3> 
      <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
       
  <div class="form-group">
     @csrf  
    <label for="firstname" class="col-sm-2  control-label">内容</label>
    <div class="col-sm-10">
      <textarea type="file" class="form-control" name="nei" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">发布</button>
    </div>
  </div>
 </form> 
  </p>      

   <form>
      <input type="text" name="uid" value="{{$query['uid']??''}}" placeholder="请输入">
      <button>搜索</button>
   </form> 
    <h3>留言列表</h3><h4>当前的浏览量:{{cache('static')}}</h4>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>姓名</th>
         <th>留言内容</th>
		 <th>留言时间</th>
		 <th>留言操作</th>
      </tr>
   </thead>
   <tbody>
       @foreach ($data as $v)
      <tr>
         <td>{{$v->id}}</td>
         <td>{{$v->name}}</td>
         <td>{{$v->nei}}</td>
         <td>{{date('Y-m-d H:i:s',$v->addtime)}}</td>
		 <td>
		 <a href="#" class="btn btn-info">编辑</a>
         <a onclick="ajaxdestroy({{$v->id}})" href="javascript:void(0)" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach

   </tbody>
   <tr>
	  </tr>
	      <td colspan="4">{{$data->appends($query)->links()}}</td>
	  </tr>
</table>
    <a href="{{url('/exam/create')}}">添加页面</a>
 </body>
 <script>
  $(document).on('click','.pagination a',function(){
     var url=$(this).attr('href');
     $.get(url,function(res){
         $('tbody').html(res);
     });
     return false;
 });
//  $(document).on('click','.pagination a',function(){
//      var url=$(this).attr('href');
//      $.get(url,function(res){
//          $('tbody').html(res);
//      });
//      return false;
//  })
 
// //  $(document).on('click','.pagination a',function(){
// //      var url=$(this).attr('href');
// //      $.get(url,function(res){
// //          $('tbody').html(res);
// //      });
// //      return false;
// //  })

// ajax删除
function ajaxdestroy(id){
   
    if(!id){
        alert('请选择删除的id');return;
    }
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $.post('/destroy/'+id,function(res){
        if(res.code=='00000'){
            alert(res.msg);
            location.reload();
        }
    },'json')
   
}
 </script>
</html>






