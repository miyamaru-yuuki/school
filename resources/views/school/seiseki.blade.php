<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>成績一覧</title>
</head>
<body>

<h1>成績一覧</h1>
<table>
    <tr><th>名前</th><th>国語</th><th>数学</th><th>英語</th></tr>
    @foreach ($testData as $data)
        <tr><td>{{$data->name}}</td><td>{{$data->kokugo}}</td><td>{{$data->sugaku}}</td><td>{{$data->eigo}}</td></tr>
    @endforeach
</table>

</body>
</html>