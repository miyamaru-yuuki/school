<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>成績一覧</title>
</head>
<body>

<h1>{{$tname['tname']}}の成績一覧</h1>
<table>
    <tr><th>名前</th><th>国語</th><th>数学</th><th>英語</th><th>合計</th></tr>
    @foreach ($testData as $data)
        <tr><td><a href="{{url('tensuuhenkou/' .$data->kid)}}">{{$data->name}}</a></td><td>{{$data->kokugo}}</td><td>{{$data->sugaku}}</td><td>{{$data->eigo}}</td><td>{{$data->goukei}}</td></tr>
    @endforeach
    @foreach ($testAvg as $data)
        <tr><td></td><td>{{$data->kokugoavg}}</td><td>{{$data->sugakuavg}}</td><td>{{$data->eigoavg}}</td><td>{{$data->goukeiavg}}</td></tr>
    @endforeach
</table>

<p>国語の最高得点者：@foreach($kokugoMax as $data)
        {{$data['name']}}@endforeach</p>
<p>全教科の最高得点者：@foreach($goukeiMax as $data)
        {{$data['name']}}@endforeach</p>

<br>

@if(!($seitoData->isEmpty()))
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
        <input type="hidden" name="tid" value="{{$tid}}">
        <p>国語：<input type="text" name="kokugo"></p>
        <p>数学：<input type="text" name="sugaku"></p>
        <p>英語：<input type="text" name="eigo"></p>
    </div>
    <input type="submit" value="追加">
</form>
@endif

<a href="{{ url('/') }}">戻る</a>

</body>
</html>