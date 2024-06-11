<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Person;
use App\Repository\StaffRepository;
use App\Repository\CustomerRepository;
use App\Models\Customer;
use App\Models\Staff;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\select;

class StaffController extends Controller
{
    private $staffRepository;

    private $customerRepository;

    public function  __construct(StaffRepository $Staffrepository , CustomerRepository $CustomerRepository){
        $this->staffRepository = $Staffrepository;
        $this->customerRepository = $CustomerRepository;
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
        $response = $this->customerRepository->customerdelete($id);
        return $response;

    }


    public function updateprocess(Request $request):RedirectResponse{

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:50',
            'phone' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'password' => 'required|min:8|regex:#(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])#',
            // 'password_confirmation' => 'required|string|min:8|confirmed',
            'image' => 'required',
        ]);

        // dd($request->all());
        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();
        $request->image->move(public_path('img/staff/'),$image);
        $people = Person::find($request->id);
        // dd($people);
        $people->name = $request->name;
        $people->email = $request->email;
        $people->address = $request->address;
        $people->age = $request->age;
        $people->phone = $request->phone;
        $people->password = bcrypt($request->password);
        $people->status = "Active";
        $people->image = $image;
        $people->save();
        return redirect()->route('staffList');

    }
    public function register(){
        $role = DB::table('roles')->select('id', 'name')->where('status','=','Active')->get();
        // dd($role);
        return view('Admin.create',compact('role'));
    }


    public function process(Request $request):RedirectResponse{

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:50',
            'phone' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'password' => 'required|min:8|regex:#(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])#',
            // 'password_confirmation' => 'required|string|min:8|confirmed',
            'image' => 'required',
        ]);


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
        $people->phone = $request->phone;
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
        $customerlist = customer::with(['people'])->orderBy('customers.id','DESC')->whereHas('people', function ($query) {
            $query->where('status', 'Active');
        })->get();
        // $customerlist = customer::with(['customer'])->where([['status','=','Active'],
        //                                                      ['customers.status','=','Active']])->get()->toArray();
// dd($customerlist[0]->people->id);
        // dd($customerlist[0]->customer->image);

        return view('Admin.customerlist', compact('customerlist'));
    }

    public function staffList(){
        $stafflist = Staff::with(['people','role'])->orderBy('staff.id','DESC')->whereHas('people', function ($query) {
            $query->where('status', 'Active');
        })->get();
        // dd($stafflist);
        return view('Admin.stafflist', compact('stafflist'));
    }

    public function staffdelete($id){
        $customer = Person::find($id);
        $customer->status='Inactive';
        $customer->save();
        $response = $this->staffRepository->staffdelete($id);
        return $response;
    }

    // public function itemregister(){
    //     return view('Admin.itemregister');
    // }

    public function search(Request $request){
        // dd($request);
        $response = $this->staffRepository->searchRecords($request);
        return $response;
    }

}


