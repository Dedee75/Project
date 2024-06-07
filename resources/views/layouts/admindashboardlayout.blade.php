<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="https://kit.fontawesome.com/a44b41dfdc.js" crossorigin="anonymous"></script>
    <link href={{asset('CSS/admin/reset.css')}} rel="stylesheet" type="text/css" >
    <link href={{asset('CSS/admin/style.css')}} rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="{{asset('CSS/admin/customer.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/staff.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/subcategory.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/supplier.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/brand.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/list.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/register.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/item.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/admin/aDashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <title>@yield('customertitle')</title> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title></title>
</head>
<body>

    <section id="customer-main">
        <div class="main-container">
            <div class="main-nav">
                <div class="nav-col">
                    <img src="{{asset('img/nwr.jpg')}}">
                </div>
                <div class="title">
                    Aye Mi San

                </div>
                <div class="nav-container">
                   <ul>
                        <li>  <i class="fas fa-home"></i><a href="{{url('admin/dashboard')}}"> <span> Dashboard </span></a></li>
                        <li>  <i class="fas fa-home"></i><a href="{{url('admin/customerlist')}}"> <span> Customer </span></a></li>
                        <li>  <i class="fas fa-home"></i><a href="{{url('admin/stafflist')}}"> <span> Staff </span></a></li>
                        <li>  <i class="fas fa-home"></i><a href="{{url('admin/item/list')}}"> <span> Item </span></a></li>
                        <li>  <i class="fas fa-home"></i><a href="{{url('admin/subcategorylist')}}"><span> Sub Category</span></a></li>
                        <li>  <i class="fas fa-home"></i><a href="{{url('admin/brandlist')}}"> <span> Brands </span></a></li>
                        <li>  <i class="fas fa-home"></i><a href="{{url('admin/supplier/list')}}"><span> Supplier </span></a></li>
                    </ul>


                </div>
            </div>
            <div class="main-header">
                <header class="admin-navbar">
                    <div class="adminbar">
                        <div class="img-col">
                             <img src="{{asset('img/shop-logo.png')}}" style="width: 50px; height:50px; margin-left:20px;">
                        </div>
                        <div class="header-title">
                            <h2>Tech 2 Go PC & Accessories</h2>
                        </div>
                        <div>
                            <img src="" alt="">
                        </div>

                    </div>
                </header>

                <div class="admin-body">
                    @yield('admindashboardbody')
                </div>
            </div>


        </div>


    </section>
</body>
</html>
