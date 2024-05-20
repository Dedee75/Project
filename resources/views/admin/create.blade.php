@extends('layouts.adminlayout')
@section('admintitle','Admin Register')
@php
$updatestatus = false ;
if(isset($staffdata)){
$updatestatus = true;
}

@endphp
@section('adminbody')
    <div>
        <form action="{{route('admin-register-process')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Admin Registeration Form</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-group">
                <label for="name">emial</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" id="age" name="age">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone">
            </div>

            <div class="form-group">
                 <label for="address">Address</label>
                <textarea name="address" id="address" cols="30" rows="10"></textarea>

            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="image">image</label>
                <input type="file" id="image" name="image">
            </div>

            <button type="register">Register</button>
        </form>
    </div>
@endsection
