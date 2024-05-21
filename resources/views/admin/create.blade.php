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
        <form action="{{route('admin-register-process')}}" method="POST" enctype="multipart/form-data" class="admin-Register">
            @csrf
            <h2>Admin Registeration Form</h2>

            <div class="main-register-form">
                <div class="form-group ">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Please Enter Name">
                </div>

                <div class="form-group ">
                    <label for="name">Email</label>
                    <input type="email" id="email" name="email" placeholder="Please Enter Email">
                </div>

                <div class="form-group ">
                    <label for="age">Age</label>
                    <input type="text" id="age" name="age" placeholder="Please Enter Age">
                </div>

                <div class="form-group ">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Please Enter Phone Number">
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
                <button type="register" class="btn btnAdmin">Register</button>
                </div>
            </div>
        </form>
    </div>
@endsection
