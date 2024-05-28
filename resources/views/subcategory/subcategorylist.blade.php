@extends('layouts.admindashboardlayout')
@section('admintitle','Sub Category List')
@section('admindashboardbody')

<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Subcategory List </p>
    </div>

    <div class="subcategory">
        <div class="gotoregister">
            <a href="{{url('/admin/subcategory/register')}}"><Button>+ NEW</Button></a>
        </div>

        <div class="categoryinput">
            <input type="text" placeholder="Search In Here!">
        </div>

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

        <div class="gotoregister">
            <button>Search</button>
        </div>




    </div>
</div>

<div>
    <div>

    </div>
    <div>

<table class="subcategorytable">
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

        <td><a href=""></a></td>
    </tr>

    @endforeach
</table>
{{-- <a href="{{route('adminRegister')}}">Staff Register</a> --}}
    </div>

</div>
@endsection
