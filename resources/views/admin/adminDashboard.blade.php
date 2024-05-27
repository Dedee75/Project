@extends('layouts.admindashboardlayout')
@section('admintitle','Admin Dashboard')
@section('admindashboardbody')

{{auth('admin')->user()->name}}
@endsection

