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
