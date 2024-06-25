<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('CSS/customer/login/login.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/customer/register/register.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/customer/layout.css')}}">
    <link rel="stylesheet" href="{{asset('frontpart/home.css')}}">
    <link rel="stylesheet" href="{{asset('frontpart/productlist.css')}}">
    <link rel="stylesheet" href="{{asset('frontpart/productDetail.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js">

    <title>@yield('customertitle')</title>
</head>
<body>
    <section id="customer-main">
        <header class="customernavbar">

            <div class="topheader">
                <div></div>
               <p> Welcome To Our Online Shop</p>
                <div class="top-nav-login">
                    <div>
                        <img src=""style="width:30px; height:30px; border-radius: 50%;">
                    </div>
                    <div>
                        <a href="{{route('homepage')}}">Guest</a>
                    </div>
                    <div>
                        <a href="{{route('customeLogin')}}">Login</a>
                    </div>

                    <div>
                        <a href="{{route('customerRegister')}}">Create An Account</a>
                    </div>

                    <div>
                        <a href="">USD</a>
                    </div>

                </div>
            </div>

            <div class="navigation">
                <div class="mainLogo">
                    <img src="" alt="" style="width:40px; height:40px; border-radius: 50%;">
                    <p>Tech 2 Go</p>
                </div>

                <div>
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                        <a class="nav-link" href="{{route('productList')}}">Product</a>
                        <a class="nav-link" href="#">About Us </a>
                        <a class="nav-link" href="#">Contact Us </a>
                        <a class="nav-link" href="#">Feedback</a>
                    </div>
                </div>

                <div>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>

                <div>
                    <img src="" alt="" style="width:30px; height:30px; border-radius: 50%;">
                </div>

            </div>


        </header>
        <main>
            <div class="customer-body">
                @yield("customerbody")

            </div>
        </main>

        <footer>
            <div class="mainfooter">
                <div>
                    <h3>Tech 2 Go</h3>
                    <p>No.322,Pansodan.yangon.Myanmar</p>
                    <p>+959 796 366 636</p>
                    <p>Tech2go@shopping.com</p>
                </div>

                <div>
                    <h3>Customer Service</h3>
                    <p>Return Policy</p>
                    <p>Delivery Inform</p>
                    <p>Privacy Policy</p>
                </div>

                <div>
                    <h3>Subscribe</h3>
                    <p>Reduce update , hot deals, discounts sent straight to your inbox  daily</p>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <p>Secure Payment</p>

                </div>
            </div>

            <div class="lastfooter">
                <p>© 2023 Tech 2 Go. Designs By O-Technique  Myanmar</p>
            </div>
        </footer>
    </section>
</body>
</html>
