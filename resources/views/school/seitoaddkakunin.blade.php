<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>生徒追加確認</title>
</head>
<body>

<p>生徒名：{{$name}}</p>
<p>誕生日：{{$birth}}</p>
<p>電話番号：{{$tel}}</p>
<p>を追加しますか？</p>

<form action="/seitoaddkanryou" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="name" value="{{$name}}">
    <input type="hidden" name="birth" value="{{$birth}}">
    <input type="hidden" name="tel" value="{{$tel}}">
    <input type="submit" value="追加">
</form>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>