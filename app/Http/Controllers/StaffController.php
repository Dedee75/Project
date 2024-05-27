<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Person;
use App\Repository\StaffRepository;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Relationship;

use function Laravel\Prompts\select;

class StaffController extends Controller
{
    private $staffRepository;

    public function  __construct(StaffRepository $staffrepository){
        $this->staffRepository = $staffrepository;
    }
    // public function login(){
    //     return view('Login.Adminlogin');
    // }

    // public function dashboard(){

    //     $admin = DB::table('people')
    //             ->join('staff', 'staff.people_id','=', 'people.id')
    //             ->join('roles', 'roles.id', '=','staff.role_id')
    //             ->where('people.status','=','Active')
    //             ->where('people.id','=',auth('admin')->user()->id)
    //             ->select('people.*', 'roles.name as rolename')
    //             ->get();
    //             // dd($admin);
    //     return view('Admin.adminDashboard',compact('admin'));
    // }


    public function staffedit($id){
        // dd($id);
        $role = DB::table('roles')->select('id', 'name')->where('status','=','Active')->get();

        $staffdata = Person::find($id);
        return view('Admin.create',compact('role', 'staffdata'));
    }

    public function customerdelete($id){
        $customer = Person::find($id);
        $customer->status='Inactive';
        $customer->save();
        return redirect()->route('customerList');
    }

    public function updateprocess(Request $request){
        dd($request->all());
        // $uuid = Str::uuid()->toString();
        // $image = $uuid.'.'.$request->image->extension();
        // $request->image->move(public_path('img/staff/'),$image);
        // $people =
        // $people->name = $request->name;
        // $people->email = $request->email;
        // $people->address = $request->address;
        // $people->age = $request->age;
        // $people->phonenumber = $request->phone;
        // $people->password = bcrypt($request->password);
        // $people->status = "Active";
        // $people->image = $image;
        // $people->uuid = $uuid;
        // $people->save();

    }
    public function register(){
        $role = DB::table('roles')->select('id', 'name')->where('status','=','Active')->get();
        // dd($role);
        return view('Admin.create',compact('role'));
    }


    public function process(Request $request){
        $roleid = $request->role;
        // dd($roleid);
        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();
        $request->image->move(public_path('img/staff/'),$image);
        $people = new Person();
        $people->name = $request->name;
        $people->email = $request->email;
        $people->address = $request->address;
        $people->age = $request->age;
        $people->phonenumber = $request->phone;
        $people->password = bcrypt($request->password);
        $people->status = "Active";
        $people->image = $image;
        $people->uuid = $uuid;
        $people->save();
        $response = $this->staffRepository->saveRecords($roleid,$uuid);
        return $response;

    }

    public function customerList(){
        // $customerlist = customer::whereHas()where('status','Active')->get()->toArray();
        $customerlist = customer::with(['people'])->whereHas('people', function ($query) {
            $query->where('status', 'Active');
        })->get();
        // $customerlist = customer::with(['customer'])->where([['status','=','Active'],
        //                                                      ['customers.status','=','Active']])->get()->toArray();
// dd($customerlist[0]->people->id);
        // dd($customerlist[0]->customer->image);

        return view('Admin.customerlist', compact('customerlist'));
    }

    public function staffList(){
        $stafflist = Staff::with(['people','role'])->whereHas('people', function ($query) {
            $query->where('status', 'Active');
        })->get();
        // dd($stafflist);
        return view('Admin.stafflist', compact('stafflist'));
    }

    public function staffdelete($id){
        $customer = Person::find($id);
        $customer->status='Inactive';
        $customer->save();
        return redirect()->route('staffList');
    }

    public function itemregister(){
        return view('Admin.itemregister');
    }

}


