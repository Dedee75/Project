<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use App\Repository\AdminRepository;
use App\Models\customer;
use App\Models\Item;

class AdminController extends Controller
{
    //
    private $adminRepository;
    public function __construct(AdminRepository $adminrepository){
        $this->adminRepository = $adminrepository;
    }

    public function dashboard(){
        $totalcustomer = DB::table('customers')->where('customers.status','=','Active')->count();
        $inactivestaff =DB::table('staff')->where('staff.status','=','Inactive')->count();
        $activestaff =DB::table('staff')->where('staff.status','=','Active')->count();
        $totalsupplier =DB::table('suppliers')->where('suppliers.status','=','Active')->count();
        $numberofpurchase =DB::table('items')->where('items.status','=','Active')->count();

        $purchase = Item::where('status','Active')->sum('purchaseprice');
        $qty = Item::where('status','Active')->sum('qty');

        $totalpurchase = $purchase * $qty;

        return view('admin.adminDashboard',compact('totalcustomer','inactivestaff','activestaff','totalsupplier','numberofpurchase','totalpurchase'));
    }

    public function login(){
        return view('admin.login');
    }

    // public function register(){
    //     $role = DB::table('roles')->select('id', 'name')->where('status','=','Active')->get();
    //     return view('admin.create',compact('role'));
    // }

    // public function process(Request $request){
    //     // dd($request->all());
    //     $roleid = 1;
    //     $uuid = Str::uuid()->toString();
    //     $image = $uuid. '.'.$request->image->extension();
    //     $request->image->move(public_path('img/staff/'),$image);
    //     $people = new Person();
    //     $people->name = $request->name;
    //     $people->email = $request->email;
    //     $people->address = $request->address;
    //     $people->age = $request->age;
    //     $people->phone = $request->phone;
    //     $people->password = bcrypt($request->password);
    //     $people->status = "Active";
    //     $people->image = $image;
    //     $people->uuid = $uuid;
    //     $people->save();
    //     // dd($uuid);
    //     // dd($this->adminRepository);
    //     $response = $this->adminRepository->saveRecords($roleid,$uuid);
    //     return $response;
    // }

    // public function list(){
    //     $stafflist = DB::table('staff')
    //         ->join('people','people.id', '=' , 'staff.people_id')
    //         ->join('roles', 'roles.id', '=','staff.role_id')
    //         ->where('staff.status' , '=' , 'Active')
    //         ->select('people.*', 'roles.name as rolename')->get();
    //         // dd($stafflist);
    //     return view('Admin.list',compact('stafflist'));
    // }
}
