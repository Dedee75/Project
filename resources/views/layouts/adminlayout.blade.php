<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('CSS/admin/main.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/login.css')}}">
    <title>@yield('admintitle')</title>
</head>
<body>
    <header>
        <p>this is header</p>
    </header>
    <main>
        @yield('adminbody')
    </main>

</body>
</html>
