@extends('layouts.admindashboardlayout')
@section('admintitle','Supplier Registeration')
@section('admindashboardbody')

@php
$updatestatus = false ;
if(isset($supplier)){
$updatestatus = true;
}

@endphp

<div class="supplierForm">
    <div class="page-titl">
        <div class="allhead">
            <i class="fa-solid fa-headphones"></i>
            <p>Supplier Registeration</p>
        </div>

    </div>

    <div class="main-register-form">

        <form action="{{$updatestatus == true ?  route('supplierRegisterUpdateProcess') : route('supplierRegisterProcess')}}" method="POST" enctype="multipart/form-data" class="supplier-register">
            @csrf
            <h2>{{$updatestatus == true ? 'Supplier Register Update Form' : 'Supplier Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $supplier ->id : ''}}">
            <div >
                <div class="form-group">
                    <label for="name" class="col-25"> Name</label>
                    <input type="text" class="col-75" name="name" @error ('name') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $supplier ->name : old('name')}}" id="name" placeholder="Enter  Name">
                </div>
                @error('name')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="companyname">Company Name</label>
                    <input type="text" name="companyname" @error ('name') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $supplier ->companyname : old('companyname')}}" id="companyname" placeholder="Enter Company Name">
                </div>
                @error('companyname')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="email"> Email</label>
                    <input type="text" name="email" @error ('email') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $supplier ->email : old('email')}}" id="email" placeholder="Enter Email">
                </div>
                @error('email')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" @error ('phone') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $supplier ->phone : old('phone')}}" id="phone" placeholder="Enter Phone Number ">
                </div>
                @error('phone')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" @error ('address') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror cols="74" rows="8">{{$updatestatus == true ? $supplier ->address : ''}} </textarea>
                </div>
                @error('address')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="supplier-form-group">
                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image"  id="image" @error ('image') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror>
                    </div>
                    @error('image')
                    <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="supplier-button">
                    <button class=" btn3">{{$updatestatus == true ? 'Update': 'Register'}}</button>
                    <a href="{{{route('supplierList')}}}" class="cancel-btn"><p>Cancel</p> </a>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection
