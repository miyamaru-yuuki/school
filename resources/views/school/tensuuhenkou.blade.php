<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>点数変更</title>
</head>
<body>

<p>生徒名：{{$testData[0]['name']}}</p>

<form action="/tensuuhenkoukanryou" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="kid" value="{{$testData[0]['kid']}}">
    <input type="hidden" name="tid" value="{{$testData[0]['tid']}}">
    <p>国語<input type="text" name="kokugo" value="{{$testData[0]['kokugo']}}"></p>
    <p>数学<input type="text" name="sugaku" value="{{$testData[0]['sugaku']}}"></p>
    <p>英語<input type="text" name="eigo" value="{{$testData[0]['eigo']}}"></p>
    <input type="submit" value="変更">
</form>

<a href="{{ url('seiseki/' .$testData[0]['tid']) }}">戻る</a>

</body>
</html>