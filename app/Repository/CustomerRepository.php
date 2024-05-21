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
}
