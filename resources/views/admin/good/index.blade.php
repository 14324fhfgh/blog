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
 </head>
 <body>
    <h3>商品列表</h3></hr>
    <table class="table">
	<caption>基本的表格布局</caption>
    <thead>
      <tr>
	     <th>ID</th>
         <th>商品名称</th>
         <th>商品描述</th>
		 <th>商品价格</th>
         <th>商品时间</th>
		 <th>商品操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->good_id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->good_name}}</td>
         <td>{{$v->good_ne}}</td>
         <td>{{$v->price}}</td>
         <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
		 <td>
		 <a href="{{url('/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
		 <a onclick="ajaxdestroy({{$v->good_id}})" href="javascript:void(0)" class="btn btn-danger">删除</a>
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






