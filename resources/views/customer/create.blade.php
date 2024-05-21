@extends('layouts.customerlayout')
@section('customertitle','Customer Register')
@php
$updatestatus = false ;
if(isset($staffdata)){
$updatestatus = true;
}

@endphp
@section('customerbody')
    <div>
        <form action="{{route('customer-register-process')}}" method="POST" enctype="multipart/form-data" class="register">
            @csrf
            <h2>Customer Registeration Form</h2>

            <div class="main-register-form">
                <div class="form-group form-group6">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Please Enter Name">
                </div>

                <div class="form-group form-group3">
                    <label for="name">email</label>
                    <input type="email" id="email" name="email" placeholder="Please Enter Email">
                </div>

                <div class="form-group form-group4">
                    <label for="age">Age</label>
                    <input type="text" id="age" name="age" placeholder="Please Enter Age">
                </div>

                <div class="form-group form-group5">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Please Enter Phone" >
                </div>

                <div class="form-group form-group2">
                     <label for="address">Address</label>
                    <textarea name="address" id="address" cols="30" rows="3" placeholder="Please Enter Address" ></textarea>

                </div>

                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" id="password" name="password" placeholder="Please Create Password">
                </div>

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" id="image" name="image">
                </div>

                <button type="register" class=" btn2">Register</button>
            </div>


        </form>
    </div>
@endsection
