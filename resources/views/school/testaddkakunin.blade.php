<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>テスト追加確認</title>
</head>
<body>

<p>テスト名：{{$tname}}</p>
<p>を追加しますか？</p>

<form action="/testaddkanryou" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="tname" value="{{$tname}}">
    <input type="submit" value="追加">
</form>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>