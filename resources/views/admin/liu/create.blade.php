<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
    <script src="admin/static/js/jquery.min.js"></script> 
</head>
<body>
<h3>留言板</h3></hr>yh
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf
      <p>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">内容</label>
    <div class="col-sm-10">
      <textarea type="file" class="form-control" name="uname" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">发布</button>
    </div>
  </div>
  </p>       