<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
    <script src="static/admin/js/jquery.min.js"></script>
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
      <input type="text" class="form-control" name="good_name" id="firstname" placeholder="请输入名字">
      <b></b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品图片</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="img"id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品描述</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" name="good_ne" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-default">添加</button>
    </div>
  </div>
 </form>
</body>
<script>
      function checkname(good_name){
        var flag=true;
          var reg=/^[\u4e00-\u9fa5\w.\-]{1,16}$/;
          if(!reg.test(good_name)){
            $('input[name="good_name"]').next().text('商品名称需是中文、字母、数字、下划线组成');
              return false;
          }
          //ajax验证唯一性
          $.ajax({
            method:"get",
            url:"/checkOnly",
            data:{good_name:good_name},
            async:false,
        }).done(function ( res){
          if( res!=0 ){
                $('input[name="good_name"]').next().text('商品名称已存在');
                flag=false;
              }
        });
          return flag;
        } 
      $('input[name="good_name"]').blur(function(){
        $('input[name="good_name"]').next().text('');
          var good_name=$('input[name="good_name"]').val();
          checkname(good_name);
      });
      //提交验证
      $('[type="button"]').click(function(){
          //名称验证
          $('input[name="good_name"]').next().text('');
          var good_name=$('input[name="good_name"]').val();
          var nameflag=checkname(good_name);
          if(nameflag==true){
            $('form').submit();
          }
      });
</script>
</html>





