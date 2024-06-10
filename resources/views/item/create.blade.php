@extends('layouts.adminlayout')
@section('admintitle','Item Register')
@php


$updatestatus = false ;
if(isset($item)){
$updatestatus = true;
}

@endphp

@section('adminbody')
    <div class="admin-register-form">
        <form action="{{$updatestatus == true ?  route('itemUpdateProcess') : route('itemRegisterProcess')}}" method="POST" enctype="multipart/form-data" class="item-register">
            @csrf
            <h2>{{$updatestatus == true ? 'Item Register Update Form' : 'Item Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $item->id : ''}}">

            <div class="item-main-register-form">
                <div class="item-form-group">
                    <label for="name">Item Name:</label>
                    <input type="text" class="customerform"  @error ('name') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror id="name" name="name" value="{{$updatestatus == true ? $item -> name : old('name')}}"  placeholder="Please Enter Item Name">
                </div>
                @error('name')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="item-dropdown-form">
                    <div class="item-form-group3">
                        <label for="supplier">Supplier:</label>
                        <select name="supplier">
                            <option>Select Supplier ...</option>
                            @foreach($supplier as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group2">
                        <label for="qty">Qty:</label>
                        <input type="number" class="customerform" @error ('qty') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror id="number" value="{{$updatestatus == true ? $item -> qty : old('qty')}}" name="qty">
                    </div>
                    @error('qty')
                    <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror

                </div>

                <div class="item-dropdown-form">
                    <div class="item-form-group2">
                        <label for="sprice">Sale Price:</label>
                        <input type="number" id="sprice" @error ('sprice') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $item -> saleprice : old('sprice')}}" name="sprice">
                    </div>@error('sprice')
                    <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror

                    <div class="form-group2">
                        <label for="pprice">Purchase Price</label>
                        <input type="number" id="pprice" @error ('pprice') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $item -> purchaseprice : old('pprice')}}" name="pprice" >

                    </div>
                    @error('pprice')
                    <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div  class="item-dropdown-form" >
                    <div class="item-form-group4">
                        <label for="subcategory">Subcategory:</label>
                        <select name="subcategory">
                            <option>Select SubCategory...</option>
                            @foreach($subcategory as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group3">
                        <label for="brand">Brand:</label>
                        <select name="brand">
                            <option>Select Brand...</option>
                            @foreach($brand as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="item-form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" @error ('description') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror cols="30" rows="10">{{$updatestatus == true ? $item ->description:old('description')}}</textarea>
                </div>
                @error('description')
                    <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror


                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" @error ('image') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror id="image[]" name="image[]" multiple>
                </div>
                @error('image')
                    <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror

                <div class="">
                <a href="{{route('itemList')}}"class="cancel-btn"><p>Cancel</p></a>
                <a href=""><button type="register" class="btn btnAdmin">{{$updatestatus == true ? 'Update': 'Register'}}</button></a>
                </div>
            </div>
        </form>
    </div>
@endsection
