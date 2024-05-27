@extends('layouts.adminlayout')
@section('admintitle','Admin Register')
@php
$updatestatus = false ;
if(isset($staffdata)){
$updatestatus = true;
}

@endphp
@section('adminbody')
    <div class="admin-register-form">
        <form action="" method="POST" enctype="multipart/form-data" class="admin-Register">
            @csrf


            <div class="main-register-form">
                <div class="form-group ">
                    <label for="name">Name</label>
                    <input type="text" class="customerform"  id="name" name="name" placeholder="Please Enter Item Name">
                </div>

                <div class="form-group ">
                    <label for="supplier">Supplier</label>
                    <input type="text" class="customerform" name="supplier"   id="supplier" name="supplier" placeholder="Please Enter supplier Name">
                </div>

                <div class="form-group ">
                    <label for="age">Age</label>
                    <input type="text" class="customerform"  id="age" name="age" placeholder="Please Enter Age">
                </div>

                <div class="form-group ">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone"   placeholder="Please Enter Phone Number">
                </div>

                <div class="form-group ">
                     <label for="address">Address</label>
                    <textarea name="address" id="address" cols="42" rows="5" placeholder="Please Enter Address"></textarea>

                </div>

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" id="password" name="password" placeholder="Please Create Password">
                </div>

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for=""></label>
                <button type="register" class="btn btnAdmin">Item Register</button>
                </div>
            </div>
        </form>
    </div>
@endsection
