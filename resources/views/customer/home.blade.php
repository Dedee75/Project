@extends('layouts.customerlayout')
@section('customertitle', 'Customer Home')
@section('customerbody')

    {{-- {{auth('customer')->user()->name}} --}}
    <div>
        <div class="slide-part">
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <div>
                        @foreach ($itemlistthree as $item)
                        <div class="slide-flex-second">
                            <img src="{{asset('img/item/'.$item->photo)}}" alt="">
                            <div class="text">
                                <h2>{{ $item->name }}</h2>
                                <h4>{{$item->description}}$</h4>
                                <p>Read More</p>
                            </div>
                        </div>  
                    @endforeach
                    </div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <div>
                        @foreach($itemlistone as $item)
                        <div class="slide-flex-second">
                            <img src="{{asset('img/item/'.$item->photo)}}" alt="" style="width:420px">
                            <div class="text">
                                <h2>{{ $item->name }}</h2>
                                <h4>{{$item->description}}$</h4>
                                <p>Read More</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>


                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>

                    <div>

                        @foreach ($itemlisttwo as $item)
                            <div class="slide-flex">
                                <img src="{{asset('img/item/'.$item->photo)}}" alt="">
                                <div class="text">
                                    <h2>{{ $item->name }}</h2>
                                    <h4>{{$item->description}}$</h4>
                                    <p>Read More</p>
                                </div>
                            </div>
                        @endforeach

{{--
                        <img src="{{ asset('frontpart/img/photo_2023-10-18_17-56-51.jpg') }}" style="width:400px">
                        <div class="text">
                            <h2>Asus VivoBook S15 OLED</h2>
                            <h3>Bape Edition</h3>
                            <p></p>
                            <p>Learn More</p>
                        </div> --}}
                    </div>

                </div>





                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            {{-- <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div> --}}


        </div>
        <div class="best-selling">
            <h1>BEST SELLING</h1>

            <div class="best-selling-flex">
                <div class="samsung">
                    @foreach ($latestdesktop as $item)
                        <div class="all-in-one-desktop">
                            <img src="{{ asset('/img/item/' .$item->photo) }}" alt="" width="350px">
                            <div>
                                <h3>{{$item->name}}</h3>
                            <p>Learn More</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <div>
                        @foreach ($latestlaptop as $item)
                            <div class="best-selling-laptop">
                                <img src="{{ asset('/img/item/' .$item->photo) }}" alt="" width="300px">
                                <div>
                                    <h3>{{$item->name}}</h3>
                                     <p>Learn More</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="power-flex">
                        @foreach ($latestaccessory as $item)
                            <div class="all-in-one-desktop" style="margin-left:50px;">
                                <img src="{{ asset('/img/item/' .$item->photo) }}" alt=""style="width:200px; ">
                                <h3>{{$item->name}}</h3>
                                <p>Learn More</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="new-arrivel">
            <h1>NEW ARRIVEL</h1>

            <div class="new-arrivel-items">
                  @foreach ($itemlist as $item)
                    <div class="new-arrival-flex">
                        <img src="{{asset('img/item/'.$item->photo)}}" alt="">
                        <div>
                             <h3>{{ $item->name }}</h3>
                            <h4>{{$item->saleprice}}$</h4>
                            <p>Read More</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="main-latest-product-form">
            <h1>LATEST PRODUCTS</h1>

            <div class="latest-product-form">
                @foreach ($latestdesktop as $item)
                <div class="all-in-one-desktop">
                    <img src="{{ asset('/img/item/' .$item->photo) }}" alt="" width="300px">
                    <h3>{{$item->name}}</h3>
                    <p>Learn More</p>
                </div>
                @endforeach

                <div>
                    @foreach ($latestlaptop as $item)
                    <div class="all-in-one-css">
                        <img src="{{ asset('/img/item/' .$item->photo) }}" alt="" width="200px">
                        <div>
                            <h3>{{$item->name}}</h3>
                            <p>Learn More</p>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($latestaccessory as $item)
                    <div class="all-in-one-css">
                        <img src="{{ asset('/img/item/' .$item->photo) }}" alt="" width="200px">
                        <div>
                            <h3>{{$item->name}}</h3>
                        <p>Learn More</p>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
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

@endsection
