<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/sorte')}}" method="post">
          @csrf
          <input type="text"name="name">
          <input type="password" name="password">
          <button>提交</button>
    </form>
</body>
</html>