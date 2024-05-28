@extends('layouts.admindashboardlayout')
@section('admintitle','Supplier Registeration')
@section('admindashboardbody')

@php
$updatestatus = false ;
if(isset($supplier)){
$updatestatus = true;
}

@endphp

<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Supplier Registeration</p>

    </div>

    <div>
        <h4>Supplier Registeration Form</h4>

        <form action="{{$updatestatus == true ?  route('supplierRegisterUpdateProcess') : route('supplierRegisterProcess')}}" method="POST" enctype="multipart/form-data" class="admin-Register">
            @csrf
            <h2>{{$updatestatus == true ? 'Supplier Register Update Form' : 'Supplier Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $supplier ->id : ''}}">
            <div>
                <div>
                    <label for="name"> Name</label>
                    <input type="text" name="name" value="{{$updatestatus == true ? $supplier ->name : ''}}" id="name" placeholder="Enter  Name">
                </div>

                <div>
                    <label for="companyname">Company Name</label>
                    <input type="text" name="companyname" value="{{$updatestatus == true ? $supplier ->companyname : ''}}" id="companyname" placeholder="Enter Company Name">
                </div>

                <div>
                    <label for="email"> Email</label>
                    <input type="text" name="email" value="{{$updatestatus == true ? $supplier ->email : ''}}" id="email" placeholder="Enter Email">
                </div>

                <div>
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{$updatestatus == true ? $supplier ->phone : ''}}" id="phone" placeholder="Enter Phone Number ">
                </div>


                <div>
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="30" rows="10">{{$updatestatus == true ? $supplier ->address : ''}}</textarea>
                </div>

                <div>
                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">
                    </div>

                    <div>
                        <button class="btn3">Upload</button>
                    </div>
                </div>

                <div class="subCButton">
                    <button class=" btn3">{{$updatestatus == true ? 'Update': 'Register'}}</button>
                    <button class=" btn3">Cancel</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
