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
 <h3>欢迎【{{session('lu')->name}}】登录,<a href="{{url('logout')}}">退出</a></h3>
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
         <th>文章名称</th>
         <th>文章分类</th>
		 <th>文章重要性</th>
		 <th>是否显示</th>
         <th>文章作者</th>
         <th>作者email</th>
		 <th>关键字</th>
         <th>网页描述</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($data as $v)
      <tr>
         <td>{{$v->id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->wname}}</td>
         <td>{{$v->cid}}</td>
         <td>{{$v->xing==1?'普通':'置顶'}}</td>
         <td>{{$v->shi==1?'√':'×'}}</td>
         <td>{{$v->zuo}}</td>
         <td>{{$v->email}}</td>
         <td>{{$v->zi}}</td>
         <td>{{$v->miao}}</td>
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

    //第一种ajax删除
    // function ajaxdestroy(id){
    //     if(!id){
    //         alert('请选择删除id');return;
    //     }
    //     $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    //     $.ajax({
    //         method:"post",
    //         url:"/destroy/"+id,
    //         data:'',
    //         dataType:'json',
    //     }).done(function ( res){
    //         if(res.code=='00000'){
    //            alert(res.msg);
    //            location.reload(); 
    //         }
    //     });
    // }


    //第二种ajax删除
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






