<?php

namespace App\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
class StaffRepository {
    public function saveRecords($roleid,$uuid){
        $peopleid = DB::table('people')->where('uuid','=', $uuid)->get();
        // dd($peopleid);
        $staff = new Staff();
        $staff->person_id = $peopleid[0]->id;
        $staff->role_id = (int)$roleid;
        $staff->uuid = $uuid;
        $staff->status = "Active";
        $staff->save();
        return redirect()->route('staffList');
    }

    public function searchRecords(Request $request)
    {


        $stafflist = Staff::with(['people', 'role'])
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

        return view('admin.stafflist' ,compact('stafflist'));


    }

}
