<table>
      <tr>
          <th>ID</th>
          <th>名称</th>
          <th>性别</th>
          <th>班级</th>
          <th>操作</th>
      </tr>
      @foreach ($data as $v)
      <tr>
           <td>{{$v->brand_id}}</td>
           <td>{{$v->name}}</td>
           <td>
           @if($v->sex==1)
           男
           @else
           女
           @endif
        
           </td>
           <td>{{$v->bid}}</td>
           <td>
           <a href="{{url('/student/edit/'.$v->brand_id)}}" class="btn btn-info">修改</a>
           <a href="{{url('/student/del/'.$v->brand_id)}}"class="btn btn-danger">删除</a>
           </td>
      </tr>
      @endforeach
</table>
{{$data->links()}}
<a href="{{url('brand.create')}}">添加页面</a>