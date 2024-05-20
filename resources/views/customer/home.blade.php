@extends('layouts.customerlayout')
@section('customertitle','Customer Home')
@section('customerbody')

{{auth('customer')->user()->name}}

@endsection
