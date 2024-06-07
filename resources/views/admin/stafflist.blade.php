@extends('layouts.admindashboardlayout')
@section('admintitle','Staff List')
@section('admindashboardbody')

<div>
    <div class="page-title">
        <div class="allhead">
            <i class="fa-solid fa-headphones"></i>
            <p>Staff List</p>
        </div>
    </div>
</div>

<div>
    <div>
        <div>
            <div class="subcategory">
                <div class="supplierRegister">
                    <button><a href="{{url('/admin/register')}}">+ NEW</a></button>
                </div>

                <div class="staff">
                    <form action="{{route('staffSearch')}}" method="POST" >
                        @csrf
                        <input type="text" name="search" placeholder="Please Search Here!">

                        <button type="submit" class="gotoregister">Search</button>
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
                <th>Role</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach ($stafflist as $staff )
            <tr>
                {{-- {{dd($staff->staff->image)}} --}}
                <td>{{$staff->people->id}}</td>
                <td>{{$staff->people->name}}</td>
                <td>{{$staff->people->email}}</td>
                <td>{{$staff->people->address}}</td>
                <td>{{$staff->people->age}}</td>
                <td>{{$staff->people->phone}}</td>
                <td>{{$staff->role->name}}</td>
                <td><img width="80" height="80" src="{{asset('/img/staff/' .$staff->people->image)}}"/></td>
                <td>{{$staff->people->status}}</td>
                <td>
                    <a href="{{url('/admin/staff/edit/'.$staff->people->id)}}">Edit</a>
                    l
                    <a href="{{url('/admin/staff/delete/'.$staff->people->id)}}">Delete</a>
                </td>
            </tr>

            @endforeach
        </table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
