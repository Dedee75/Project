@extends('layouts.admindashboardlayout')
@section('admintitle','Customer List')
@section('admindashboardbody')

<div>
    <div class="page-title">
        <div class="allhead">
            <i class="fa-solid fa-headphones"></i>
            <p>Customer List </p>
        </div>
    </div>
</div>

<div>
    <div>
        <div>
            <div class="subcategory">
                <div class="supplierRegister">
                    <button>Hi</button>
                </div>

                <div class="staff">
                    <form action="{{route('customerSearch')}}" method="POST" class="">
                        @csrf
                        <input type="text" name="search" placeholder="Please Search Here!">

                        <button type="submit" class="gotoregister">Search</button>

                        <button>Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>

<table class="alltable">
    <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Age</th>
        <th>Phone Number</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>

    </tr>

    @foreach ($customerlist as $customer )
    <tr>
        {{-- {{dd($customer->customer->image)}} --}}
        <td>{{$customer->id}}</td>
        <td>{{$customer->people->name}}</td>
        <td>{{$customer->people->email}}</td>
        <td>{{$customer->people->address}}</td>
        <td>{{$customer->people->age}}</td>
        <td>{{$customer->people->phone}}</td>
        <td><img width="80" height="80" src="{{asset('/img/customer/' .$customer->people->image)}}"/></td>
        <td>{{$customer->people->status}}</td>
        <td>
            <a href="{{url('/admin/listedit/'.$customer->people->id)}}">Edit</a>
            l
            <a href="{{url('/admin/customer/delete/'.$customer->people->id)}}">Delete</a>
        </td>

    </tr>

    @endforeach
</table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
