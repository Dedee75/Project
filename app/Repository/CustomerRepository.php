<?php

namespace App\Repository;

use App\Models\customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class CustomerRepository
{
    public function saveRecords($uuid)
    {
       $peopleid = DB::table('people')->where('uuid', '=', $uuid)->get();
       $customer = new customer();
       $customer->person_id = $peopleid[0]->id;
    //    $staff->role_id = (int)$roleid;
        // $staff->role_id = 1;
       $customer->uuid = $uuid;
       $customer->status = "Active";
       $customer->save();
       return redirect()->route('homepage');
    }

    public function customerdelete($id){
        $customer = Customer::where('person_id',$id)->first();
        // dd($customer);
        $customer->status='Inactive';
        $customer->save();
        return redirect()->route('customerList');
    }

    public function searchRecords(Request $request)
    {


        $customerlist = Customer::with(['people'])
        ->whereHas('people', function ($query) use ($request) {
            $search = '%' . $request->search . '%';
            $query->where('status', 'Active')
                  ->where(function ($subQuery) use ($search) {
                      $subQuery->where('name', 'LIKE', $search)
                               ->orWhere('email', 'LIKE', $search)
                               ->orWhere('address', 'LIKE', $search)
                               ->orWhere('phone', 'LIKE', $search);
                  });
        })
        ->orderBy('id', 'DESC')
        ->get();
                // dd($stafflist);

        return view('admin.customerlist' ,compact('customerlist'));


    }
}
