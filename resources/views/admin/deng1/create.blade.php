<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
<h3>登录</h3></hr>
<b style="color:red">{{session('msg')}}</b>
<!-- <b style="color:red">{{session('msg')}}</b> -->
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">名字</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="firstname" placeholder="请输入名字">
    
    </div>
    <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">密码</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="pass"  id="firstname" placeholder="请输入名字">
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">登录</button>
    </div>
  </div>
 </form>
</body>
</html>





