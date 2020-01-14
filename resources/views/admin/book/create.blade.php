<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
<h3>图书添加</h3></hr>yh
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">图书名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="bname" id="firstname" placeholder="请输入名字">
      <b style="color:red">{{$errors->first('bname')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="zuo" id="firstname" placeholder="请输入名字">
      <b style="color:red">{{$errors->first('zuo')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">图书封面</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="img"id="firstname" placeholder="请输入名字">
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





