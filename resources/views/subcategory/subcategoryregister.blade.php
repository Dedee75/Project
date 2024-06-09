@extends('layouts.admindashboardlayout')
@section('admintitle','Sub Category Register')
@section('admindashboardbody')
@php
$updatestatus = false ;
if(isset($subcategory)){
$updatestatus = true;
}

@endphp
<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Sub Category Registeration</p>

    </div>

    <div>

        <form action="{{$updatestatus == true ?  route('subcategoryRegisterUpdateProcess') : route('subcategoryRegisterProcess')}}" method="POST" enctype="multipart/form-data" class="subcategory-Register">
            @csrf
            <h2>{{$updatestatus == true ? 'Sub Category Register Update Form' : 'Sub Category Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $subcategory ->id : ''}}">
            <div class="subcategory-form">
                <div class="sub-form">
                    <label for="name"> Sub Category Name:</label>
                    <input type="text" name="name" @error ('name') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $subcategory -> name : old('name')}}" id="name" placeholder="Enter Sub Category Name">
                </div>
                @error('name')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="form-group3">
                    <label for="category">Category</label>
                    <select name="category">
                        <option value="categoryid">Select Category Name....</option>
                        @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sub-form">
                    <label for="description"> Description:</label>
                    <input type="text" name="description" @error ('description') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $subcategory -> description : old('description')}}" id="description" placeholder="Enter Description">
                </div>
                @error('description')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="subCButton">
                    <button class=" btn3">{{$updatestatus == true ? 'Update': 'Register'}}</button>
                    <button class=" btn3">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
