<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use App\Repository\CustomerRepository;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    //
    private $customerRepository;
    public function __construct(CustomerRepository $customerRepository){
        $this->customerRepository = $customerRepository;
    }

    public function home(){
        return view('customer.login');
    }

    public function login(){
        return view('customer.login');
    }

    public function register(){
        $role = DB::table('roles')->select('id', 'name')->where('status','=','Active')->get();
        return view('customer.create',compact('role'));
    }

    public function process(Request $request){
        // dd($request);
        // $roleid = $request->role;
        $uuid = Str::uuid()->toString();
        $image = $uuid. '.'.$request->image->extension();
        $request->image->move(public_path('img/customer/'),$image);
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
        // dd($uuid);
        // dd($this->adminRepository);
        $response = $this->customerRepository->saveRecords($uuid);
        return $response;
    }
}
