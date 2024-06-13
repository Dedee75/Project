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

            <div>
                <form action="{{route('subcategorySearch')}}" method="POST" class="categoryinput">
                    @csrf
                <input type="text" name="search" placeholder="Search In Here!">
                <div class="dropdown">
                    <select name="subcategory">
                        <option value="">Select Category</option>
                        @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="gotoregister">Search</button>
                <button>Reset</button>
                </form>

            </div>
            {{-- <div class="gotoregister">
                <button>Search</button>
            </div> --}}


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
        <td>{{$subcategory->categoryname}}</td>
        <td>{{$subcategory->description}}</td>
        <td>{{$subcategory->date}}</td>
        <td>{{$subcategory->status}}</td>
        <td>

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
