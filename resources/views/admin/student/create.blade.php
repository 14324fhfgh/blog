
<h3>员工添加</h3></hr>
 <form class="form-horizontal" action="{{url('/store')}}" role="form" method="post">
      @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">员工名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="yhao" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">员工班级</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="bid"id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2  control-label">品牌图片</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="img"id="firstname" placeholder="请输入名字">a>
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

