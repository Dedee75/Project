<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('CSS/admin/main.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/register.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/login.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/customer/layout_admin.css')}}">

    <title>@yield('admintitle')</title>
</head>
<body>
    <header>
        <div class="admin-header">
            <img src="" alt="" style="width:40px; height:40px;">
            <h1>Tech 2 Go PC & ACCESSORIES</h1>
        </div>
    </header>
    <main class="adminmain">
        @yield('adminbody')
    </main>

</body>
</html>
