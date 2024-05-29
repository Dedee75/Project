@extends('layouts.admindashboardlayout')
@section('admintitle','Brand List')
@section('admindashboardbody')

@php
$updatestatus = false ;
if(isset($brand)){
$updatestatus = true;
}
@endphp
<div>
    <div class="page-titl">
        <i class="fa-solid fa-headphones"></i>
        <p>Brand Registeration</p>

    </div>

    <div>

        <form action="{{$updatestatus == true ?  route('brandRegisterUpdateProcess') : route('brandRegisterProcess')}}" method="POST" enctype="multipart/form-data" class="admin-Register">
            @csrf
            <h2>{{$updatestatus == true ? 'Brand Register Update Form' : 'Brand Register Form'}}</h2>

            @if ($updatestatus == true)
            @method('PATCH')

            @endif
            <input type="hidden" name="id" value="{{$updatestatus == true ? $brand->id : ''}}">
            <div>

                <div class="form-group">
                    <label for="name">Supplier Name:</label>
                    <select name="supplier">
                        <option value="supplierid">Select Supplier</option>
                        @foreach($supplier as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="name"> Brand Name:</label>
                    <input type="text" name="name" value="{{$updatestatus == true ? $brand -> name : ''}}" id="brand" placeholder="Enter Brand Name">
                </div>

                <div class="subCButton">
                    <button class=" btn3">Cancel</button>
                    <button class=" btn3">{{$updatestatus == true ? 'Update': 'Register'}}</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
