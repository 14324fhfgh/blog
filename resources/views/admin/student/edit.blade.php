
<h3>学生修改</h3></hr>
 <form class="form-horizontal" action="{{url('/student/update/'.$data->brand_id)}}" role="form" method="post">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">学生名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="firstname" value="{{$data->name}}" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生性别</label>
    <div class="col-sm-10">
    @if($data->sex==1)
      <input type="radio" class="form-control" name="sex" value="男" id="firstname" placeholder="请输入名字" checked>男
      <input type="radio" class="form-control" name="sex" value="女" id="firstname" placeholder="请输入名字">女
      @else
      <input type="radio" class="form-control" name="sex" value="男" id="firstname" placeholder="请输入名字">男
      <input type="radio" class="form-control" name="sex" value="女" id="firstname" placeholder="请输入名字" checked>女
      @endif
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">学生班级</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->bid}}"  name="bid"id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
 </form>
</body>
</html>

