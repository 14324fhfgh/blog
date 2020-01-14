<html>
      <head>
            <meta charset="UTF-8">
            <title></title>
            <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
            <script src="/static/admin/js/jquery.min.js"></script>
            <meta name="csrf-token" content="{{ csrf_token() }}"> 
      </head>
      <body>
            <h3>列表</h3>
            <span>当前访问量:{{$num}}</span>
            <hr/>
            <p>价格:{{$goods->goods_price}}</p>
            <p>{{$goods->content}}</p>
            <button>购买</button>
      </body>
      <script>
          $('button').click(function(){
               var goods_id={{$goods->goods_id}};
               $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
               $.post('/goods/addcart',{goods_id:goods_id},function(res){
                   if(res.code=='00001'){
                       alert(res.msg);
                       location.href='/create';
                   }
                   if(res.code=='00000'){
                       alert(res.msg);
                       location.href='/cart';
                   }
               },'json');
          })
      </script>
</html>