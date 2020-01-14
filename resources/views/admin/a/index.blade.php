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
		 <a href="{{url('/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
		 <a href="{{url('/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	  <tr>
	      <td colspan="4">{{$data->appends()->links()}}</td>
	  </tr>
   </tbody>
</table>
    <a href="{{url('create')}}">添加页面</a>
 </body>
 <script src="/static/admin/js/jquery.min.js"></script>
 <script>
        $(document).on('click','.pagination a',(function(){
            var url=$(this).attr('href');
            $.get(url,function(res){
                $('tbody').html(res)
            });
            return false;
        });
 </script>
</html>






