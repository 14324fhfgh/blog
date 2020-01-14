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
      <input type="text" name="name" placeholder="请输入">
      <button>搜索</button>
   </form> 
    <h3>品牌列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>品牌名称</th>
         <th>品牌网址</th>
		 <th>品牌描述</th>
		 <th>品牌操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->brand_id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="100"/>{{$v->brand_name}}</td>
         <td>{{$v->brand_url}}</td>
         <td>{{$v->brand_desc}}</td>
		 <td>
		 <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
		 <a href="{{url('/brand/del/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	  <tr>
	      <td colspan="4">{{$data->appends($query)->links()}}</td>
	  </tr>
   </tbody>
</table>
    <a href="{{url('create')}}">添加页面</a>
 </body>
 <script>
 //ajax分页
 $(document).on('click','.pagination a',function(){
     var url=$(this).attr('href');
     $.get(url,function(res){
         $('tbody').html(res);
     });
     return false;
 })
 
//  $(document).on('click','.pagination a',function(){
//      var url=$(this).attr('href');
//      $.get(url,function(res){
//          $('tbody').html(res);
//      });
//      return false;
//  })

ajax删除
function ajaxdestroy(id){
    if(!id){
        alert('请选择删除的id');return;
    }
    $.get('/destroy/'+id,function(res){
        if(res.code=='00000'){
            alert(res.msg);
            location.reload();
        }
    },'json')
}
 </script>
</html>






