<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Repository\SupplierRepository;

class SupplierController extends Controller
{
    private $supplierRepository;
    public function __construct(SupplierRepository $supplierrepository){
        $this->supplierRepository = $supplierrepository;

    }

    public function supplierList(){
        $supplierlist = Supplier::where('status' ,'=' ,'Active')
        ->get();
        // dd($stafflist);
        return view('supplier.supplierlist', compact('supplierlist'));
    }

    public function supplierregister(){
        // $supplier = DB::table('suppliers')->select('id', 'name')->where('status','=','Active')->get();
        // dd($role);
        return view('supplier.create');
    }

    public function supplierregisterprocess(Request $request){

        // dd($request);
        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();
        $request->image->move(public_path('img/supplier/'),$image);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->companyname = $request->companyname;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->registerdate = Carbon::now();
        $supplier->status = "Active";
        $supplier->uuid = $uuid;
        $supplier->image = $image;
        $supplier->save();

        return redirect()->route('supplierList');
    }

    public function supplieredit($id){
        // dd($id);
        $supplier = Supplier::find($id);
        // dd($stafflist);
        return view('supplier.create', compact('supplier'));
    }

    public function updateprocess(Request $request){

        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();
        $request->image->move(public_path('img/supplier/'),$image);
        $supplier = Supplier::find($request->id);
        // dd($people);
        $supplier->name = $request->name;
        $supplier->companyname = $request->companyname;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->image = $image;
        $supplier->update();
        return redirect()->route('supplierList');

    }

    public function supplierdelete($id){
        $supplier = Supplier::find($id);
        $supplier->status='Inactive';
        $supplier->save();
        return redirect()->route('supplierList');
    }

    public function search(Request $request){
        // dd($request);
        $response = $this->supplierRepository->searchRecords($request);
        return $response;
    }
}
