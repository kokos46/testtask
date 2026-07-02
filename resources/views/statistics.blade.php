<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/">Dashboard</a>
    <h1>Statistics for {{ $linkData['short_url'] }}</h1>
    <h2>Redirect count: {{$linkData['click_count']}}</h2>
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>IP address</th>
                <th>Redirect time</th>
            </tr>
        </thead>
        @foreach ($linkData->urlStatistics as $link)
            <tr>
                <td>{{$link['id']}}</td>
                <td>{{$link['ip_address']}}</td>
                <td>{{$link['created_at']}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>