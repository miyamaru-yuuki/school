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
        <tr><td>{{$data->name}}</td><td>{{$data->birth}}</td><td>{{$data->tel}}</td></tr>
    @endforeach
</table>

</body>
</html>