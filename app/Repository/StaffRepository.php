<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
class StaffRepository {
    public function saveRecords($roleid,$uuid){
        $peopleid = DB::table('people')->where('uuid','=', $uuid)->get();
        $staff = new Staff();
        $staff->people_id = $peopleid[0]->id;
        $staff->role_id = (int)$roleid;
        $staff->uuid = $uuid;
        $staff->status = "Active";
        $staff->save();
        return redirect()->route('adminDashboard');

    }

}
