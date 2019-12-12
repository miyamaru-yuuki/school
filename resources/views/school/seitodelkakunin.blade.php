<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>生徒削除確認</title>
</head>
<body>

<p>{{$seitoData->name}}</p>
<p>{{$seitoData->birth}}</p>
<p>{{$seitoData->tel}}</p>
<p>を削除しますか？</p>

<form action="/seitodelkanryou" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="seitoid" value="{{$seitoData->seitoid}}">
    <input type="submit" value="削除">
</form>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>