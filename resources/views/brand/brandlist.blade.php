@extends('layouts.admindashboardlayout')
@section('admintitle','Sub Category List')
@section('admindashboardbody')

<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Brand List </p>
    </div>

    <div>
        <a href="">+</a>
    </div>

</div>

<div>
    <table>
        <tr>
            <th>#ID</th>
            <th>Brand Name</th>
            <th>Date</th>
            <th>Staff</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach ($brandlist as $brand )
        <tr>
            {{-- {{dd($customer->customer->image)}} --}}
            <td>{{$brand->id}}</td>
            <td>{{$brand->name}}</td>
            <td>{{$brand->date}}</td>
            <td>{{$brand->supplier->staff}}</td>
            <td>{{$brand->status}}</td>
            <td>{{$brand->action}}

                {{-- <a href="{{url('/admin/subcategory/edit/'.$subcategory->id)}}">Edit</a>
                <a href="{{url('/admin/subcategory/delete/'.$subcategory->id)}}">Delete</a> --}}
            </td>

            <td><a href=""></a></td>
        </tr>

        @endforeach
    </table>
</div>

@endsection
