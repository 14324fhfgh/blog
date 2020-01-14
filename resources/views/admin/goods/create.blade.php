<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script> 
    <script src="/static/admin/js/bootstrap.min.js"></script>  
</head>
<body>
<h3>商品添加</h3></hr>yh
<!-- @if ($errors->any()) <div class="alert alert-danger"> 
<ul> 
   @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
   </ul> </div> @endif -->
 <form class="form-horizontal" action="{{url('/goods/store')}}" role="form" method="post" enctype="multipart/form-data">
      @csrf



 <ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">商品相册</a></li>
  <li><a href="#desc" data-toggle="tab">商品详情</a></li>
	
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_name"  id="firstname" placeholder="请输入名字">
      <b style="color:red"></b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品货号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_sn" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品品牌</label>
    <div class="col-sm-10">
      <select class="form-control" name="brand_id" >
            <option value="0">请选择商品品牌</option>
            @foreach($brand as $v)
            <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
            @endforeach
          </select>  
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="cate_id" >
            <option value="0">请选择商品分类</option>
            @foreach($category as $v)
            <option value="{{$v->cate_id}}">@php echo str_repeat('|--',$v->level);@endphp {{$v->cate_name}}</option>
            @endforeach
            </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_price" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品库存</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_number" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品缩略图</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="goods_img"id="firstname" placeholder="请输入名字">
    </div>
  </div>
    
    </p>
	</div>
	<div class="tab-pane fade" id="ios">
<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品相册</label>
    <div class="col-sm-10">
      <input type="file" class="form-control"  multiple="multiple" name="goods_imgs[]"id="firstname" placeholder="请输入名字">
    </div>
  </div>
</p>
	</div>
	<div class="tab-pane fade" id="desc">
<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">商品详情</label>
    <div class="col-sm-10">
      <textarea type="file" class="form-control" name="content" id="firstname" placeholder="请输入名字"></textarea>
    </div>
  </div>
</p>
	</div>
	
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加</button>
    </div>
 </form>
</body>
</html>





