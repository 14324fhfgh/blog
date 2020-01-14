<!-- <form action="{{url('/store')}}"method="post">
      @csrf
      新闻名称<input type="text" name="new_name"><br>
      <select name="cid" >
            <option value="0">请选择父级分类</option>
            @foreach($data as $v)
            <option value="{{$v->new_id}}">@php echo str_repeat('|--',$v->level);@endphp {{$v->new_name}}</option>
            @endforeach
      </select><br>     
      作者<input type="text" name="new_zuo"><br>
      <input type="submit" value="添加"><br>
</form> -->


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
<h3>品牌添加</h3></hr>yh
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">新闻名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="new_name" value="{{session('data')['new_name']}}" id="firstname" placeholder="请输入名字">
      <b style="color:red">{{$errors->first('new_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="cid" >
            <option value="0">请选择父级分类</option>
            @foreach($data as $v)
            <option value="{{$v->new_id}}">@php echo str_repeat('|--',$v->level);@endphp {{$v->new_name}}</option>
            @endforeach
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="new_zuo"id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加</button>
    </div>
  </div>
 </form>
</body>
</html>





