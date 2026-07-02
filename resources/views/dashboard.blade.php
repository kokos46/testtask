<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @guest
        <a href="/register">Register</a>
        <a href="/login">Sign in</a>
    @endguest
    @auth
        <h1>Hello, {{Auth::user()->name}}</h1>
        <a href="/logout">Sign out</a>

        <form action="/createurl" method='post'>
            <input type="text" name="source" placeholder="Source link">
            <input type="submit" value="Shorten link">
        </form>

        <div>
            @foreach ($links as $link)
                <h1>{{$link->short_url}}</h1>
                <p>{{ $link->source_url }}</p>
            @endforeach
        </div>
    @endauth
</body>
</html>