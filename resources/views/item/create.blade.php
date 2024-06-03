@extends('layouts.adminlayout')
@section('admintitle','Admin Register')
@php


$updatestatus = false ;
if(isset($item)){
$updatestatus = true;
}

@endphp

@section('adminbody')
    <div class="admin-register-form">
        <form action="{{$updatestatus == true ?  route('itemUpdateProcess') : route('itemRegisterProcess')}}" method="POST" enctype="multipart/form-data" class="admin-Register">
            @csrf
            <h2>{{$updatestatus == true ? 'Item Register Update Form' : 'Item Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $item->id : ''}}">

            <div class="main-register-form">
                <div class="form-group ">
                    <label for="name">Item Name:</label>
                    <input type="text" class="customerform"  id="name" name="name" value="{{$updatestatus == true ? $item -> name : ''}}"  placeholder="Please Enter Item Name">
                </div>

                <div>
                    <div class="form-group">
                        <label for="supplier">Supplier:</label>
                        <select name="supplier">
                            <option>Select Supplier ...</option>
                            @foreach($supplier as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="qty">Qty:</label>
                        <input type="number" class="customerform"  id="number" value="{{$updatestatus == true ? $item -> qty : ''}}" name="qty">
                    </div>

                </div>

                <div>
                    <div class="form-group ">
                        <label for="sprice">Sale Price:</label>
                        <input type="number" id="sprice" value="{{$updatestatus == true ? $item -> saleprice : ''}}" name="sprice">
                    </div>

                    <div class="form-group ">
                        <label for="pprice">Purchase Price</label>
                        <input type="number" id="pprice" value="{{$updatestatus == true ? $item -> purchaseprice : ''}}" name="pprice" >

                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <label for="subcategory">Subcategory:</label>
                        <select name="subcategory">
                            <option>Select SubCategory...</option>
                            @foreach($subcategory as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="brand">Brand:</label>
                        <select name="brand">
                            <option>Select Brand...</option>
                            @foreach($brand as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10">{{$updatestatus == true ? $item ->description:''}}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" id="image[]" name="image[]" multiple>
                </div>

                <div class="form-group">
                <button type="cancel" class="btn4">Cancel</button>
                <button type="register" class="btn btnAdmin">{{$updatestatus == true ? 'Update': 'Register'}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
