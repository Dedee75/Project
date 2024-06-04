<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;

class SupplierRepository
{
    public function searchRecords(Request $request)
    {
        $name = 'suppliers.name';
        $email = 'suppliers.email';
        $address = 'suppliers.address';
        $phone = 'suppliers.phone';
        $companyname = 'suppliers.companyname';

        $supplierlist = DB::table('suppliers')
                ->where('status','=','Active')
                ->orderBy('suppliers.id','DESC')
                ->where($name,'LIKE','%'.$request->search.'%')
                ->orWhere($email,'LIKE','%'.$request->search.'%')
                ->orWhere($address,'LIKE','%'.$request->search.'%')
                ->orWhere($phone,'LIKE','%'.$request->search.'%')
                ->orWhere($companyname, 'LIKE','%' .$request->search. '%')
                ->select('suppliers.*')
                ->get();

        return view('supplier.supplierlist' ,compact('supplierlist'));
    }
}
