@foreach ($data as $v)
      <tr>
         <td>{{$v->goods_id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->goods_name}}</td>
         <td>{{$v->cate_id}}</td>
         <td>{{$v->goods_static==1?'上架':'下架'}}</td>
         <td>{{$v->goods_script}}</td>
         <td>{{$v->goods_desc}}</td>
		 <td>
		 <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
		 <a href="{{url('/brand/del/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	  <tr>
	      <td colspan="4">{{$data->links()}}</td>
	  </tr>