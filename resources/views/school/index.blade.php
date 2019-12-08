<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>生徒一覧</title>
</head>
<body>

<h1>生徒一覧</h1>
<table>
    <tr><th>名前</th><th>生年月日</th><th>電話番号</th></tr>
    @foreach ($seitoData as $data)
        <tr><td><a href="{{url('kobetuseiseki/' .$data->seitoid)}}">{{$data->name}}</a></td><td>{{$data->birth}}</td><td>{{$data->tel}}</td></tr>
    @endforeach
</table>

<br>

<table>
    <tr><th>テスト</th></tr>
    @foreach ($testData as $data)
        <tr><td><a href="{{url('seiseki/' .$data->tid)}}">{{$data->tname}}</a></td></tr>
    @endforeach
</table>

<br>

<form action="/testaddkakunin" method="post">
    {{ csrf_field() }}
    <div>テスト追加
        <p>テスト名：<input type="text" name="tname"></p>
    </div>
    <input type="submit" value="追加">
</form>

</body>
</html>