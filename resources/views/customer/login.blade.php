@extends('layouts.customerlayout')
@section('customertitle','Customer Login')
@section('customerbody')

<div class="mainLoginForm">
    <div class="customer-login">
        <div class="customer-Login-Form">
            <h2>Csutomer Login From</h2>
            <form method="post" action="{{route('customerLoginProcess')}}" class="A-login">
                @csrf
                <input type="hidden" name="usertype" value="customer"/>
                <div class="login-form">
                    <label for="email"><b>Email</b></label>
                    <input type="email" class="customerform" name="email" id="email" placeholder="Please Enter Email!"/>
                </div>
                <div class="login-form">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="customerform" name="password" id="password" />
                </div>
                <button type="submit" class="btn abtn" name="login" > Login </button>
            </form>

        </div>
    </div>
</div>

@endsection
