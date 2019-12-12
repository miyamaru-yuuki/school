<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>生徒変更画面</title>
</head>
<body>

<h1>生徒変更画面</h1>

<form action="/seitohenkoukanryou" method="post">
    {{ csrf_field() }}
    <p>生徒名：<input type="text" name="name" value="{{$seitoData['name']}}"></p>
    <p>誕生日：<input type="text" name="birth" value="{{$seitoData['birth']}}"></p>
    <p>電話番号：<input type="text" name="tel" value="{{$seitoData['tel']}}"></p>
    <input type="hidden" name="seitoid" value="{{$seitoData['seitoid']}}">
    <input type="submit" value="変更">
</form>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>