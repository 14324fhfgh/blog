@foreach ($data as $v)
      <tr>
         <td>{{$v->good_id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->good_name}}</td>
         <td>{{$v->good_ne}}</td>
         <td>{{$v->price}}</td>
         <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
		 <td>
		 <a href="{{url('/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>
		 <a onclick="ajaxdestroy({{$v->good_id}})" href="javascript:void(0)" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	  <tr>
	      <td colspan="4">{{$data->links()}}</td>
	  </tr>