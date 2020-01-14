<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
<h3>分类添加</h3></hr>yh
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">分类名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cate_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="parent_id" >
            <option value="0">请选择父级分类</option>
            @foreach($data as $v)
            <option value="{{$v->cate_id}}">@php echo str_repeat('|--',$v->level);@endphp {{$v->cate_name}}</option>
            @endforeach
            </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" name="is_show" checked="checked" value="1">是
      <input type="radio" name="is_show" value="2">否
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">是否导航栏显示</label>
    <div class="col-sm-10">
    <input type="radio" name="is_nav_show"  value="1">是
      <input type="radio" name="is_nav_show" checked="checked" value="2">否
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





