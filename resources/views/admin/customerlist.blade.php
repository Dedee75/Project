@extends('layouts.admindashboardlayout')
@section('admintitle','Customer List')
@section('admindashboardbody')

<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Customer List </p>
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
        <th>Address</th>
        <th>Age</th>
        <th>Phone Number</th>
        <th>Image</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    @foreach ($customerlist as $customer )
    <tr>
        {{-- {{dd($customer->customer->image)}} --}}
        <td>{{$customer->id}}</td>
        <th>{{$customer->people->name}}</th>
        <th>{{$customer->people->email}}</th>
        <th>{{$customer->people->address}}</th>
        <th>{{$customer->people->age}}</th>
        <th>{{$customer->people->phone}}</th>
        <th><img width="80" height="80" src="{{asset('/img/customer/' .$customer->people->image)}}"/></th>
        <th>{{$customer->people->status}}</th>
        <th><a href="{{url('/admin/listedit/'.$customer->people->id)}}">Edit</a></th>
        <th><a href="{{url('/admin/customer/delete/'.$customer->people->id)}}">Delete</a></th>
        <th><a href=""></a></th>
    </tr>

    @endforeach
</table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
