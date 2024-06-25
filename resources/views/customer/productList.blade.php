@extends('layouts.customerlayout')
@section('customertitle', 'Customer Home')
@section('customerbody')

    <div class="itemImage">
        <div>
            <img src="{{ asset('img/item/017296d6-0a7a-44f3-896b-af3cb2ebdd59.jpg') }}" alt="">
            <p>Desktop</p>
        </div>

        <div>
            <img src="{{ asset('img/item/0cc61b00-64c7-47ac-860c-a2a955a386e7.jpg') }}" alt="">
            <p>Laptop</p>
        </div>

        <div>
            <img src="{{ asset('img/item/4c184a8c-45d8-4655-9e52-64278277f4e4.jpg') }}" alt="">
            <p>Accessories</p>
        </div>
    </div>


    <div>
        <div class="productlist-container">
            <div class="filter">
                <h3>Filters</h3>

                <div>
                    <div>
                        <p>price</p>

                        <form action="">

                            <div class="minmaxPrice">
                                <div>
                                    <h5>Minimum price</h5>
                                    <input type="number" name="minprice" id="minprice">
                                </div>

                                <div>
                                    <h5>Maximum price</h5>
                                    <input type="number" name="maxprice" id="maxprice">
                                </div>
                            </div>

                            <button>Find</button>
                        </form>

                        <div>
                            <form action="" class="partaner-form">

                                <h5>Brand</h5>

                                <div class="brand-dropdown">

                                    <select name="customer-brand">
                                        <option value="">Select Brand</option>
                                        @foreach ($brand as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button>Find</button>
                            </form>

                        </div>
                    </div>

                    <div class="our-partaner">
                        <h4>Our Partaner</h4>
                        <div class="partaner-logo">
                            @foreach ($supplierimage as $image)
                                <img src="{{ asset('img/supplier/' . $image->image) }}"
                                    style="width: 50px; height:50px; border-radius:50px;" alt="">
                            @endforeach
                        </div>
                    </div>

                </div>


            </div>

            <div>
                <div class="product-detail">
                    @foreach ($productlist as $item)
                        <div class="productlist">
                            <img src="{{ asset('img/item/' . $item->photo) }}" alt="">
                            <h3>{{ $item->name }}</h3>
                            <h4>{{$item->description}}</h4>
                            <h4>{{ $item->saleprice }}$</h4>
                            <a href="{{url('/customer/productdetail/'.$item->id)}}" class="product-detail-btn">
                                Detail
                            </a>
                        </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="just-for-you-page">
        <h2>Just For You</h2>

        <div class="slide-image">
            <div>
                <div class="just-for-you-items-contaier">
                    <div class="just-for-you-items">
                        @foreach ($justforyou as $item)
                            <div class="just-for-you-flex">
                                <img src="{{ asset('img/item/' . $item->photo) }}" alt="">
                                <div>
                                    <h3>{{ $item->name }}</h3>
                                    <h4>{{ $item->saleprice }}$</h4>
                                    <p>Read More</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="popular-prroduct-container">
        <h2>Popular Products</h2>
        <div class="popular-product">
            <div>
                <div>
                    @foreach ($latestlaptop as $item)
                        <div class=" all-in-one-laptop">
                            <img src="{{ asset('/img/item/' . $item->photo) }}" alt="" width="300px">

                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                @foreach ($latestdesktop as $item)
                    <div class="all-in-one-desktop">
                        <img src="{{ asset('/img/item/' . $item->photo) }}" alt="" width="350px">
                    </div>
                @endforeach
            </div>

            <div>
                <div class="">
                    @foreach ($latestaccessory as $item)
                        <div class="all-in-one-desktop" style="margin-left:50px;">
                            <img src="{{ asset('/img/item/' . $item->photo) }}" alt=""style="width:200px; ">

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>




@endsection
