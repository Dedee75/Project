@extends('layouts.admindashboardlayout')
@section('admintitle','Item List')
@section('admindashboardbody')

<div>
    <div class="page-title">
        <div class="allhead">
            <i class="fa-solid fa-headphones"></i>
            <p>Item List </p>
        </div>
    </div>
</div>

<div>
    <div>
        <div class="subcategory">
            <div class="gotoregister">
                <a href="{{url('/admin/item/register')}}"><Button>+ NEW</Button></a>
            </div>

            <div class="item">
                <div class="categoryinput2">
                    <form action="{{route('itemSearch')}}" method="POST" class="itemform">
                        @csrf
                        <input type="text" name="search" placeholder="Search In Here!">


                        <div class="dropdown">

                            {{-- <button class="dropdown-btn">
                                <p>Select Supplier</p>
                              <i class="fa fa-caret-down"></i>


                            </button> --}}
                            {{-- <div class="dropdown-content"> --}}
                                <select name="supplier">
                                    <option value="">Select Supplier</option>
                                    @foreach($supplier as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            {{-- </div> --}}
                        </div>

                        <div class="dropdown">
                                <select name="subcategory">
                                    <option value="">Select Subcategory</option>
                                    @foreach($subcategory as $subcategory)
                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>

                        </div>

                        <div class="dropdown">

                            <select name="brand">
                                <option value="">Select Brand</option>
                                @foreach($brand as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="gotoregister">
                            <button>Search</button>
                        </div>
                    </form>

                </div>



            </div>


        </div>
    </div>
</div>

<div>
    {{-- <div class="subcategory">
        <div class="supplierRegister">
            <button><a href="{{url('/admin/brand/register')}}">+ NEW</a></button>
        </div>

        <div class="supplier">
            <form action="{{route('supplierSearch')}}" method="POST" >
                @csrf
                <input type="text" name="search" placeholder="Please Search Here!">

                <button type="submit" class="gotoregister">Search</button>
            </form>
        </div>
    </div> --}}
</div>

<div>
    <table class="alltable">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Supplier</th>
            <th>Sale Price</th>
            <th>Purchase Price</th>
            <th>Subcategory</th>
            <th>Brand</th>
            <th>Qty</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach ($itemlist as $item )

        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>
                @if($item->supplier)
                    {{ $item->supplier->name }}
                @else
                    No Supplier
                @endif
            </td>
            <td>{{$item->saleprice}}</td>
            <td>{{$item->purchaseprice}}</td>
            <td>
                @if($item->subcategory)
                    {{ $item->subcategory->name }}
                @else
                    No Supplier
                @endif
            </td>
            <td>{{$item->brand->name}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->description}}</td>
            <td><img width="80" height="80" src="{{asset('/img/item/' .$item->item_photo->photo)}}"/></td>
            <td>{{$item->status}}</td>
            <td>

                <a href="{{url('/admin/item/edit/'.$item->id)}}">Edit</a>
                <a href="{{url('/admin/item/delete/'.$item->id)}}">Delete</a>
            </td>
        </tr>

        @endforeach
    </table>
</div>
@endsection
