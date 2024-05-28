@extends('layouts.admindashboardlayout')
@section('admintitle','Sub Category Register')
@section('admindashboardbody')
@php
$updatestatus = false ;
if(isset($category)){
$updatestatus = true;
}

@endphp
<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Sub Category Registeration</p>

    </div>

    <div>
        <h4>Sub Category Registeration Form</h4>

        <form action="{{$updatestatus == true ?  route('subcategoryRegisterUpdateProcess') : route('subcategoryRegisterProcess')}}" method="POST" enctype="multipart/form-data" class="admin-Register">
            @csrf
            <h2>{{$updatestatus == true ? 'Sub Category Register Update Form' : 'Sub Category Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $subcategory ->id : ''}}">
            <div>
                <div>
                    <label for="name"> Sub Category Name:</label>
                    <input type="text" name="name" value="{{$updatestatus == true ? $subcategory -> name : ''}}" id="name" placeholder="Enter Sub Category Name">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category">
                        <option value="categoryid">Select Category Name....</option>
                        @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="description"> Description:</label>
                    <input type="text" name="description" value="{{$updatestatus == true ? $subcategory -> description : ''}}" id="description" placeholder="Enter Description">
                </div>

                <div class="subCButton">
                    <button class=" btn3">{{$updatestatus == true ? 'Update': 'Register'}}Register</button>
                    <button class=" btn3">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
