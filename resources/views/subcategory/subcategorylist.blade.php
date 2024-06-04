@extends('layouts.admindashboardlayout')
@section('admintitle','Sub Category List')
@section('admindashboardbody')

<div>
    <div class="page-title">
        <div class="allhead">
            <i class="fa-solid fa-headphones"></i>
            <p>Subcategory List </p>
        </div>
    </div>


</div>

<div>
    <div>
        <div class="subcategory">
            <div class="gotoregister">
                <a href="{{url('/admin/subcategory/register')}}"><Button>+ NEW</Button></a>
            </div>

            <div class="categoryinput">
                <form action="{{route('subcategorySearch')}}" method="POST">
                    @csrf
                <input type="text" name="search" placeholder="Search In Here!">

                </form>
                <button type="submit" class="gotoregister">Search</button>
            </div>
            {{-- <div class="gotoregister">
                <button>Search</button>
            </div> --}}

            <div class="dropdown">
                <button class="btn" style="border-left:1px solid #0d8bf2">
                    <p>Select Subcategory</p>
                  <i class="fa fa-caret-down"></i>

                </button>
                <div class="dropdown-content">
                  <a href="#">Link 1</a>
                  <a href="#">Link 2</a>
                  <a href="#">Link 3</a>
                </div>
            </div>
        </div>
    </div>
    <div>

<table class="alltable">
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
            l
            <a href="{{url('/admin/subcategory/delete/'.$subcategory->id)}}">Delete</a>
        </td>
    </tr>

    @endforeach
</table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
