@extends('layouts.customerlayout')
@section('customertitle','Customer Login')
@section('customerbody')

<div class="mainLoginForm">
    <div class="customer-login">
        <h1>Cusutomer Login Form</h1>

        <div class="customer-Login-Form">

            <div>
                <img src="" alt="" style="width:300px; height:300px;">
            </div>

            <form method="post" action="{{route('customerLoginProcess')}}" class="customerLogin">
                @csrf
                <input type="hidden" name="usertype" value="customer"/>
                <div class="login-form">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="customerform" name="email" id="email" placeholder="Please Enter Email!"/>
                </div>
                <div class="login-form">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="customerform2" name="password" id="password" placeholder="Please Enter Password">
                </div>
                <button type="submit" class="btn btn2" name="login" > Login </button>
            </form>

        </div>
    </div>
</div>

@endsection
