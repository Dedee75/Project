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
                <div class="supplier-form-group">
                    <label for="name" class="col-25"> Name</label>
                    <input type="text" class="col-75" name="name" value="{{$updatestatus == true ? $supplier ->name : ''}}" id="name" placeholder="Enter  Name">
                </div>

                <div class="supplier-form-group">
                    <label for="companyname">Company Name</label>
                    <input type="text" name="companyname" value="{{$updatestatus == true ? $supplier ->companyname : ''}}" id="companyname" placeholder="Enter Company Name">
                </div>

                <div class="supplier-form-group">
                    <label for="email"> Email</label>
                    <input type="text" name="email" value="{{$updatestatus == true ? $supplier ->email : ''}}" id="email" placeholder="Enter Email">
                </div>

                <div class="supplier-form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{$updatestatus == true ? $supplier ->phone : ''}}" id="phone" placeholder="Enter Phone Number ">
                </div>


                <div class="supplier-form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="74" rows="8">{{$updatestatus == true ? $supplier ->address : ''}} </textarea>
                </div>

                <div class="supplier-form-group">
                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                </div>

                <div class="subCButton">
                    <button class=" btn3">{{$updatestatus == true ? 'Update': 'Register'}}</button>
                    <button class=" btn4">Cancel</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
