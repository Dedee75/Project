@extends('layouts.admindashboardlayout')
@section('admintitle','Supplier List')
@section('admindashboardbody')

<div>
    <div class="page-title">
        <div class="allhead">
            <i class="fa-solid fa-headphones"></i>
            <p>Supplier List</p>
        </div>
    </div>
</div>

<div>
    <div>
        <div class="subcategory">
            <div class="supplierRegister">
                <button><a href="{{url('admin/supplier/register')}}">+ NEW</a></button>
            </div>

            <div class="supplier">
                <form action="{{route('supplierSearch')}}" method="POST" class="mainsupplier">
                    @csrf
                    <input type="text" name="search" placeholder="Please Search Here!">

                    <button type="submit" class="gotoregister">Search</button>
                    <button>Reset</button>
                </form>
            </div>
        </div>
    </div>
    <div>

<table class="alltable">
    <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Company Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Register Date</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
        {{-- <th>Edit</th>
        <th>Delete</th> --}}
    </tr>

    @foreach ($supplierlist as $supplier )
    <tr>
        {{-- {{dd($customer->customer->image)}} --}}
        <td>{{$supplier->id}}</td>
        <td>{{$supplier->name}}</td>
        <td>{{$supplier->email}}</td>
        <td>{{$supplier->companyname}}</td>
        <td>{{$supplier->address}}</td>
        <td>{{$supplier->phone}}</td>
        <td>{{$supplier->registerdate}}</td>
        <td><img width="80" height="80" src="{{asset('/img/sup*plier/' .$supplier->image)}}"/></td>
        <td>{{$supplier->status}}</td>
        <td>
            <a href="{{url('/admin/supplier/edit/'.$supplier->id)}}">Edit</a>
        l
        <a href="{{url('/admin/supplier/delete/'.$supplier->id)}}">Delete</a>
        </td>
    </tr>

    @endforeach
</table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
