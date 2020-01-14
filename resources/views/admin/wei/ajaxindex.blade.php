@foreach ($data as $v)
      <tr>
         <td>{{$v->id}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="100"/>{{$v->wname}}</td>
         <td>{{$v->cid}}</td>
         <td>{{$v->xing==1?'普通':'置顶'}}</td>
         <td>{{$v->shi==1?'√':'×'}}</td>
         <td>{{$v->zuo}}</td>
         <td>{{$v->email}}</td>
         <td>{{$v->zi}}</td>
         <td>{{$v->miao}}</td>
		 <td>
		 <a href="{{url('/edit/'.$v->id)}}" class="btn btn-info">编辑</a>
		 <a onclick="ajaxdestroy({{$v->id}})" href=""javascript:void(0)"" class="btn btn-danger">删除</a>
		 </td>
      </tr>
	  @endforeach
	  <tr>
	      <td colspan="4">{{$data->links()}}</td>
	  </tr>