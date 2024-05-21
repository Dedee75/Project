@extends('layouts.adminlayout')
@section('admintitle','Admin Login')
@section('adminbody')

<div class="mainLoginForm">
    <div class="admin-login">
        <div>
            <h1>Admin Login From</h1>

            <div class="admin-Login-Form">

                <div>
                    <img src="" alt="" style="width:300px; height:300px;">
                </div>

                <div>
                    <form method="POST" action="{{route('adminLoginProcess')}}" class="A-login">
                        @csrf
                        <input type="hidden" name="usertype" value="admin"/>
                        <div class="login-form">
                            <label for="email"><b>Email</b></label>
                            <input type="email" class="adminform" name="email" id="email" placeholder="Please Enter Email!"/>
                        </div>
                        <div class="login-form">
                            <label for="password"><b>Password</b></label>
                            <input type="password" class="adminform" name="password" id="password" placeholder="Please Enter Password!">
                        </div>
                        <button type="submit" class="btn btn2" name="login" > Login </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection