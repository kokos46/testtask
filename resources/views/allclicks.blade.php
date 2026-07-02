<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/">Dashboard</a>
    <h1>Statistics for all links</h1>
    <table>
        <thead>
            <tr>
                <td>№</td>
                <td>IP address</td>
                <td>Short link</td>
                <td>Click time</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row['id'] }}</td>
                    <td>{{ $row['ip_address'] }}</td>
                    <td>{{ $row['link'] }}</td>
                    <td>{{ $row['click_time'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>