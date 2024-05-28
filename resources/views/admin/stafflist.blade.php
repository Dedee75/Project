@extends('layouts.admindashboardlayout')
@section('admintitle','Staff List')
@section('admindashboardbody')

<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Staff List</p>
    </div>
</div>

<div>
    <div>

    </div>

    <div>

        <table class="customertable">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th>Role</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach ($stafflist as $staff )
            <tr>
                {{-- {{dd($staff->staff->image)}} --}}
                <td>{{$staff->people->id}}</td>
                <th>{{$staff->people->name}}</th>
                <th>{{$staff->people->email}}</th>
                <th>{{$staff->people->address}}</th>
                <th>{{$staff->people->age}}</th>
                <th>{{$staff->people->phone}}</th>
                <th>{{$staff->role->name}}</th>
                <th><img width="80" height="80" src="{{asset('/img/staff/' .$staff->people->image)}}"/></th>
                <th>{{$staff->people->status}}</th>
                <th>
                    <a href="{{url('/admin/staff/edit/'.$staff->people->id)}}">Edit</a>
                    l
                    <a href="{{url('/admin/staff/delete/'.$staff->people->id)}}">Delete</a>
                </th>
                <th><a href=""></a></th>
            </tr>

            @endforeach
        </table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
