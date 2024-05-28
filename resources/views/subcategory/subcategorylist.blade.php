@extends('layouts.admindashboardlayout')
@section('admintitle','Sub Category List')
@section('admindashboardbody')

<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Subcategory List </p>
    </div>

    <div>
        <a href="{{url('/admin/subcategory/register')}}">+</a>
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
        <th>Category Name</th>
        <th>Description</th>
        <th>Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @foreach ($subcategorylist as $subcategory )
    <tr>
        {{-- {{dd($customer->customer->image)}} --}}
        <td>{{$subcategory->id}}</td>
        <td>{{$subcategory->name}}</td>
        <td>{{$subcategory->category->name}}</td>
        <td>{{$subcategory->description}}</td>
        <td>{{$subcategory->date}}</td>
        <td>{{$subcategory->status}}</td>
        <td>{{$subcategory->category->action}}

            <a href="{{url('/admin/subcategory/edit/'.$subcategory->id)}}">Edit</a>
            <a href="{{url('/admin/subcategory/delete/'.$subcategory->id)}}">Delete</a>
        </td>

        <td><a href=""></a></td>
    </tr>

    @endforeach
</table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
