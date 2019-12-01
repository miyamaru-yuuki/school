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

<br>

<form action="/seisekiaddkakunin" method="post">
    {{ csrf_field() }}
    <div>成績追加
        <p>生徒名：
            <select name="seitoid">
                @foreach($seitoData as $data)
                    <option value="{{$data['seitoid']}}">{{$data['name']}}</option>
                @endforeach
            </select>
        </p>
        <p>テスト名：
        <select name="tid">
            @foreach($testData as $data)
                <option value="{{$data['tid']}}">{{$data['tname']}}</option>
            @endforeach
        </select>
        </p>
        <p>国語：<input type="text" name="kokugo"></p>
        <p>数学：<input type="text" name="sugaku"></p>
        <p>英語：<input type="text" name="eigo"></p>
    </div>
    <input type="submit" value="追加">
</form>

</body>
</html>