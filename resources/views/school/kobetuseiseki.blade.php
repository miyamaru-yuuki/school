<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>{{$testData[0]->name}}さんの成績</title>
</head>
<body>

<h1>{{$testData[0]->name}}さんの成績</h1>
<table>
    <tr><th>テスト名</th><th>国語</th><th>数学</th><th>英語</th><th>合計</th></tr>
    @foreach ($testData as $data)
        <tr><td>{{$data->tname}}</td><td>{{$data->kokugo}}</td><td>{{$data->sugaku}}</td><td>{{$data->eigo}}</td><td>{{$data->goukei}}</td></tr>
    @endforeach
</table>

</body>
</html>