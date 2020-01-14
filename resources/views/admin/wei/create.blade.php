<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
<h3>文章添加</h3></hr>yh
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">文章名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="wname" value="{{session('data')['wname']}}" id="firstname" placeholder="请输入名字">
      <b style="color:red">{{$errors->first('wname')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="cid" >
            <option value="">请选择父级分类</option>
            <option>1907java</option>
            <option>1907phpA</option>
            <option>1907phpB</option>
      <b style="color:red">{{$errors->first('wname')}}</b>                
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章重要性</label>
    <div class="col-sm-10">
      <input type="radio" checked="checked" name="xing" value="1">普通
      <input type="radio"  name="xing" value="2">置顶
      <b style="color:red">{{$errors->first('xing')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" checked="checked" name="shi" value="1">显示
      <input type="radio" name="shi" value="2">不显示
      <b style="color:red">{{$errors->first('shi')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">文章作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="zuo" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">作者email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">关键字</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="zi" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">网页描述</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="miao" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">图片</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" name="img" id="firstname" placeholder="请输入名字">
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





