@extends('layouts.admindashboardlayout')
@section('admintitle','Supplier List')
@section('admindashboardbody')

<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Supplier List</p>

        <a href="{{url('admin/supplier/register')}}">+</a>

        <div>
            <form action="{{route('supplierSearch')}}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Please Search Here!">

                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<div>
    <div>

    </div>
    <div>

<table>
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
        <th>{{$supplier->name}}</th>
        <th>{{$supplier->email}}</th>
        <th>{{$supplier->companyname}}</th>
        <th>{{$supplier->address}}</th>
        <th>{{$supplier->phone}}</th>
        <th>{{$supplier->registerdate}}</th>
        <th><img width="80" height="80" src="{{asset('/img/supplier/' .$supplier->image)}}"/></th>
        <th>{{$supplier->status}}</th>
        <th><a href="{{url('/admin/supplier/edit/'.$supplier->id)}}">Edit</a></th>
        <th><a href="{{url('/admin/supplier/delete/'.$supplier->id)}}">Delete</a></th>
        <th><a href=""></a></th>
    </tr>

    @endforeach
</table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
