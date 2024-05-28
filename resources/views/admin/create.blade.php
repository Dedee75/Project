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
        <form action="{{$updatestatus == true ?  route('adminRegisterUpdateProcess') : route('admin-register-process')}}" method="POST" enctype="multipart/form-data" class="admin-Register">
            @csrf
            <h2>{{$updatestatus == true ? 'Admin Register Update Form' : 'Admin Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $staffdata -> id : ''}}">

            <div class="main-register-form">
                <div class="form-group ">
                    <label for="name">Name</label>
                    <input type="text" class="customerform" value="{{$updatestatus == true ? $staffdata -> name : ''}}" id="name" name="name" placeholder="Please Enter Name">
                </div>

                <div class="form-group ">
                    <label for="name">Email</label>
                    <input type="email" class="customerform" name="email"  value="{{$updatestatus == true ? $staffdata -> email : ''}}" id="email" name="email" placeholder="Please Enter Email">
                </div>

                <div class="form-group ">
                    <label for="age">Age</label>
                    <input type="text" class="customerform" value="{{$updatestatus == true ? $staffdata -> age : ''}}" id="age" name="age" placeholder="Please Enter Age">
                </div>

                <div class="form-group ">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{$updatestatus == true ? $staffdata -> phone : ''}}"  placeholder="Please Enter Phone Number">
                </div>

                <div class="reg-form">
                    <div>
                        <label for="role"><b>Role</b></label>
                    </div>
                    <div>
                        <select name="role" {{$updatestatus == true ? "disabled" : ''}}>
                            <option value="roleid" selected>Select Role Name.... </option>
                            @foreach ($role as $value)
                            <option value="{{$value->id}}" >{{$value->name}} </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group ">
                     <label for="address">Address</label>
                    <textarea name="address" id="address" cols="42" rows="5" placeholder="Please Enter Address">{{$updatestatus == true ? $staffdata -> address : ''}}</textarea>

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
                <button type="register" class="btn btnAdmin">{{$updatestatus == true ? 'Update' : 'Register'}} </button>
                </div>
            </div>
        </form>
    </div>
@endsection
