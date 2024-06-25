@extends('layouts.customerlayout')
@section('customertitle', 'Customer Home')
@section('customerbody')
    @foreach ($latestaccessory as $item)
        <div class="product-detail-container">

            <div>
                <div class="product" style="margin-left:50px;">
                    <img src="{{ asset('/img/item/' . $item->photo) }}" alt="">

                </div>
            </div>
            <div class="product-text">
                <h2>{{ $item->name }}</h2>
                <h2>{{ $item->description }}</h2>
                <h3>{{ $item->saleprice }}$</h3>

                <h4>Product Type : {{ $item->subcategory }}</h4>
                <h4>Brand : {{ $item->brand }}</h4>

                <a href="{{ url('/customer/productdetail/' . $item->id) }}" class="product-detail-btn">
                    Add To Cart
                </a>
            </div>

        </div>

        <div class="description">
            <p>Description: {{$item->description}}</p>
        </div>
    @endforeach
    <div class="related-products-container">
        <h1>Related Products</h1>

        <div class="related-product-">
            @foreach ($relatedproducts as $item)
                <div>
                    <div class="related-product-image" style="margin-left:50px;">
                        <img src="{{ asset('/img/item/' . $item->photo) }}" alt="">
                    </div>
                </div>
                <div class="product-text">
                    <h2>{{ $item->name }}</h2>
                    <h3>{{ $item->saleprice }}$</h3>
                </div>
            @endforeach
        </div>
    </div>
@endsection
