<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>成績追加確認</title>
</head>
<body>

<p>生徒名：{{$seitoData['name']}}</p>
<p>テスト名：{{$testData['tname']}}</p>
<p>国語：{{$kokugo}}</p>
<p>数学：{{$sugaku}}</p>
<p>英語：{{$eigo}}</p>
<p>を追加しますか？</p>

<form action="/seisekiaddkanryou" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="seitoid" value="{{$seitoid}}">
    <input type="hidden" name="tid" value="{{$tid}}">
    <input type="hidden" name="kokugo" value="{{$kokugo}}">
    <input type="hidden" name="sugaku" value="{{$sugaku}}">
    <input type="hidden" name="eigo" value="{{$eigo}}">
    <input type="submit" value="追加">
</form>

<a href="{{ url('/') }}">戻る</a>

</body>
</html>