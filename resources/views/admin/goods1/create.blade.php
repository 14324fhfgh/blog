<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
<h3>商品添加</h3></hr>yh
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_name" id="firstname" placeholder="请输入名字">
      <b style="color:red">{{$errors->first('goods_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">分类id</label>
    <div class="col-sm-10">
      <select class="form-control" name="cate_id">
      <option value="">请选择</option>
      @foreach ($data as $v)
      <option value="{{$v->cate_id}}">@php echo str_repeat('|--',$v->level);@endphp {{$v->cate_name}}</option>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品状态</label>
    <div class="col-sm-10">
      <input type="radio" name="goods_static" checked="checked" value="1">上架
      <input type="radio" name="goods_static" value="2">下架
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">图片</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" name="img" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_script" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品内容</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="goods_desc" id="firstname" placeholder="请输入名字"></textarea>
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





