@extends('layouts.adminlayout')
@section('admintitle','Staff Register')
@php
$updatestatus = false ;
if(isset($staffdata)){
$updatestatus = true;
}

@endphp

@section('adminbody')
    <div class="admin-register-form">
        <form action="{{$updatestatus == true ?  route('adminRegisterUpdateProcess') : route('admin-register-process')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <h2>{{$updatestatus == true ? 'Staff Register Update Form' : 'Staff Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $staffdata -> id : ''}}">

            <div class="register-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="customerform" @error ('name') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror value="{{$updatestatus == true ? $staffdata -> name : old('name')}}" id="name" name="name" placeholder="Please Enter Name">
                </div>
                @error('name')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="customerform" @error ('email') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror name="email"  value="{{$updatestatus == true ? $staffdata -> email : old('email')}}" id="email" name="email" placeholder="Please Enter Email">
                </div>
                @error('email')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="age-role-form">
                    <div class=" form-group2">
                        <label for="age">Age</label>
                        <input type="text" class="customerform" value="{{$updatestatus == true ? $staffdata -> age : ''}}" id="age" name="age" placeholder="Please Enter Age">
                    </div>

                    <div class="form-group3">
                        <div>
                            <label for="role"><b>Role</b></label>
                            <select name="role" {{$updatestatus == true ? "disabled" : ''}}>
                                <option value="roleid" selected>Select Role Name.... </option>
                                @foreach ($role as $value)
                                <option value="{{$value->id}}" >{{$value->name}} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" @error ('email') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror name="phone" value="{{$updatestatus == true ? $staffdata -> phone : old('phone')}}"  placeholder="Please Enter Phone Number">
                </div>
                @error('phone')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror



                <div class="form-group">
                     <label for="address">Address</label>
                    <textarea name="address" @error ('address') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror id="address" cols="42" rows="5" placeholder="Please Enter Address">{{$updatestatus == true ? $staffdata -> address : old('address')}}</textarea>
                </div>
                @error('address')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" @error ('password') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror id="password" name="password" placeholder="Please Create Password">
                </div>
                @error('password')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" @error ('image') style="border-bottom: 1px solid red; background-color:rgb(255, 238, 238);" @enderror id="image" name="image">
                </div>
                @error('password')
                <div style="color: rgb(238, 94, 94);"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror

                <div class="register-button">
                    <button type="register" class="btn btnAdmin">{{$updatestatus == true ? 'Update' : 'Register'}} </button>
                    <a href="{{{route('staffList')}}}" class="cancel-btn"><p>Cancel</p> </a>
                </div>
            </div>
        </form> 
    </div>
@endsection
