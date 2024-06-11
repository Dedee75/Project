@extends('layouts.customerlayout')
@section('customertitle', 'Customer Home')
@section('customerbody')

    {{-- {{auth('customer')->user()->name}} --}}
    <div>
        <div class="slide-part">
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>

                    <div class="slide-flex">
                        <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" style="width:400px">
                        <div class="text">
                            <h2>Asus VivoBook S15 OLED</h2>
                            <h3>Bape Edition</h3>
                            <p></p>
                            <p>Learn More</p>
                        </div>
                    </div>

                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <div class="slide-flex">
                        <img src="{{asset('frontpart/img/nwr.jpg')}}" style="width:300px;">
                        <div class="text">
                            <h2>Asus VivoBook S15 OLED</h2>
                            <h3>Bape Edition</h3>
                            <p></p>
                            <p>Learn More</p>
                        </div>
                    </div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <div class="slide-flex">
                        <img src="{{asset('frontpart/img/dan yrr.jpg')}}" style="width:400px">
                        <div class="text">
                            <h2>Asus VivoBook S15 OLED</h2>
                            <h3>Bape Edition</h3>
                            <p></p>
                            <p>Learn More</p>
                        </div>
                    </div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    slides[slideIndex - 1].style.display = "block";
                    setTimeout(showSlides, 3000); // Change image every 2 seconds
                }
            </script>
        </div>
        <div class="best-selling">
            <h1>BEST SELLING</h1>

            <div class="best-selling-flex">
                <div class="samsung">
                    <div class="">
                        <h4>SAMSAUNG GALAXY TABLET SG ULTRA</h4>
                        <p>1,199 $</p>
                    </div>

                    <img src="{{asset('frontpart/img/Dedee.jpg')}}" alt="" style="width: 600px">
                </div>
                <div>
                    <div>
                        <div>
                            <h4>ALIENWARE AURORA R15 GAMING DESKTOP</h4>
                            <p>3,500 $</p>
                        </div>
                        <img src="{{asset('frontpart/img/Dedee.jpg')}}" alt="" style="width: 200px">
                    </div>

                    <div class="power-flex">
                        <div>
                            <div>
                                <h4>POWER SUPPLY</h4>
                                <p>200 $</p>
                            </div>
                            <img src="{{asset('frontpart/img/Dedee.jpg')}}" alt="" style="width: 150px">
                        </div>
                        <div>
                            <div>
                                <h4>POWER STATION</h4>
                                <p>200 $</p>
                            </div>

                            <img src="{{asset('frontpart/img/Dedee.jpg')}}" alt="" style="width: 150px">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="new-arrivel">
            <h1>NEW ARRIVEL</h1>

            <div class="new-arrivel-items">
                <div class="new-arrival-flex">
                    <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" style="width:150px;">
                    <div>
                        <h4>Logitech C922 pro</h4>
                        <h5>129 $</h5>
                        <h6>Read More</h6>
                    </div>
                </div>

                <div class="new-arrival-flex">
                    <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" style="width:150px;">
                    <div>
                        <h4>Logitech C922 pro</h4>
                        <h5>129 $</h5>
                        <h6>Read More</h6>
                    </div>
                </div>

                <div class="new-arrival-flex">
                    <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" style="width:150px;">
                    <div>
                        <h4>Logitech C922 pro</h4>
                        <h5>129 $</h5>
                        <h6>Read More</h6>
                    </div>
                </div>

                <div class="new-arrival-flex">
                    <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" style="width:150px;">
                    <div>
                        <h4>Logitech C922 pro</h4>
                        <h5>129 $</h5>
                        <h6>Read More</h6>
                    </div>
                </div>

                <div class="new-arrival-flex">
                    <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" style="width:150px;">
                    <div>
                        <h4>Logitech C922 pro</h4>
                        <h5>129 $</h5>
                        <h6>Read More</h6>
                    </div>
                </div>

                <div class="new-arrival-flex">
                    <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" style="width:150px;">
                    <div>
                        <h4>Logitech C922 pro</h4>
                        <h5>129 $</h5>
                        <h6>Read More</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-latest-product-form">
            <h1>LATEST PRODUCTS</h1>

            <div class="latest-product-form">
                <div class="all-in-one-css">
                    <img src="{{asset('frontpart/img/nwr.jpg')}}" alt="" width="350px">
                    <h3>Windows All-in-one PCs</h3>
                    <p>Learn More</p>
                </div>

                <div>

                    <div class="latest-products">
                        <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" width="150px">
                        <div>
                            <h4>Dell UltraSharp 27 4K Monitor</h4>
                            <p>Learn More</p>
                        </div>
                    </div>

                    <div class="latest-products">
                        <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" width="150px">
                        <div>
                            <h4>Dell UltraSharp 27 4K Monitor</h4>
                            <p>Learn More</p>
                        </div>
                    </div>

                    <div class="latest-products">
                        <img src="{{asset('frontpart/img/photo_2023-10-18_17-56-51.jpg')}}" alt="" width="150px">
                        <div>
                            <h4>Dell UltraSharp 27 4K Monitor</h4>
                            <p>Learn More</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
