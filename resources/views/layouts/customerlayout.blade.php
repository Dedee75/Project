<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('customer/login/login.css')}}">
    <link rel="stylesheet" href="{{asset('')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js">

    <title>@yield('customertitle')</title>
</head>
<body>
    <section id="customer-main">
        <header class="customernavbar">

            <div class="topheader">
                <div></div>
                <div>Welcome To Our Online Shop</div>
                <div>
                    <div>
                        <img src=""style="width:80px; height:80px; border-radius: 50%;">
                        <a href="">Guest</a>
                    </div>

                    <div>
                        <a href="">Login</a>
                    </div>

                    <div>
                        <a href="">Create An Account</a>
                    </div>

                    <div>
                        <p>USD</p>
                    </div>

                </div>
            </div>

            <div class="navigation">
                <div>
                    <img src="" alt="">
                    <p>Tech 2 Go</p>
                </div>

                <div>
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Product</a>
                        <a class="nav-link" href="#">About Us </a>
                        <a class="nav-link" href="#">Contact Us  </a>
                        <a class="nav-link" href="#">Feedback </a>
                    </div>
                </div>
            </div>

            <div>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </header>
        <main>
            <div class="customer-body">
                @yield("customerbody")

            </div>

        </main>

        <footer>
            <div>
                <h4>Tech 2 Go</h4>
                <p>No.322,Pansodan.yangon.Myanmar</p>
                <p>+959 796 366 636</p>
                <p>Tech2go@shopping.com</p>
            </div>

            <div>
                <h4>Customer Service</h4>
                <p>Return Policy</p>
                <p>Delivery Inform</p>
                <p>Privacy Policy</p>
            </div>

            <div>
                <h4>Subscribe</h4>
                <p>Reduce update , hot deals, discounts sent straight to your inbox  daily</p>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <h4>Secure Payment</h4>

            </div>
        </footer>
    </section>
</body>
</html>
