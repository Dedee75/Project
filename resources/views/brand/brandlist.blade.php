@extends('layouts.admindashboardlayout')
@section('admintitle','Brand List')
@section('admindashboardbody')

<div>
    <div class="page-title">
        <div class="allhead">
            <i class="fa-solid fa-headphones"></i>
            <p>Brand List </p>
        </div>
    </div>

    <div>

    </div>

</div>

<div>
    <div class="subcategory">
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
    </div>
</div>

<div>
    <table class="alltable">
        <tr>
            <th>#ID</th>
            <th>Brand Name</th>
            <th>Date</th>
            <th>Supplier Name</th>
            <th>Staff Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach ($brandlist as $brand )
        <tr>
            {{-- {{dd($customer->customer->image)}} --}}
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td>{{$brand->date}}</td>
            <td>{{$brand->suppliername}}</td>
            <td> {{$brand->staffname}}</td>
            <td>{{$brand->status}}</td>
            <td>

                <a href="{{url('/admin/brand/edit/'.$brand->id)}}">Edit</a>
                <a href="{{url('/admin/brand/delete/'.$brand->id)}}">Delete</a>
            </td>
        </tr>

        @endforeach
    </table>
</div>

@endsection
