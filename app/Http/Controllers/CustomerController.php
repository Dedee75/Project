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
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function home()
    {
        $itemlist = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(6)
            ->get();

        $itemlistone = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('items.status', '=', 'Active')
            ->where('subcategories.category_id', '=', 2)
            ->select('items.*', 'item__photos.photo as photo', 'categories.name as category_name')
            ->orderBy('items.id', 'ASC')
            ->limit(1)
            ->get();


        $itemlisttwo = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(1)
            ->get();

        $itemlistthree = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'ASC')
            ->limit(1)
            ->get();
        $latestlaptop = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('subcategories.category_id', '=', 2)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(1)
            ->get();
        $latestdesktop = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('subcategories.category_id', '=', 1)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(1)
            ->get();
        $latestaccessory = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('subcategories.category_id', '=', 3)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(2)
            ->get();
        // dd($latestdesktop);
        return view('customer.home', compact('itemlist', 'itemlistone', 'itemlisttwo', 'itemlistthree', 'latestlaptop', 'latestdesktop', 'latestaccessory'));
    }

    public function productlist()
    {

        $justforyou = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(4)
            ->get();

        $latestlaptop = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('subcategories.category_id', '=', 2)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(2)
            ->get();

        $latestdesktop = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('subcategories.category_id', '=', 1)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(1)
            ->get();

        $latestaccessory = DB::table('items')
            ->join('item__photos', 'item__photos.item_id', '=', 'items.id')
            ->join('subcategories', 'subcategories.id', '=', 'items.subcategory_id')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('item__photos.primaryphoto', '=', 1)
            ->where('subcategories.category_id', '=', 3)
            ->where('items.status', '=', 'Active')
            ->select('items.*', 'item__photos.photo as photo')
            ->orderBy('items.id', 'DESC')
            ->limit(2)
            ->get();
        return view('customer.productList', compact('justforyou', 'latestlaptop', 'latestdesktop','latestaccessory'));
    }

    public function productdetail()
    {
        return view('customer.productDetail');
    }

    public function login()
    {
        return view('customer.login');
    }

    public function register()
    {
        $role = DB::table('roles')->select('id', 'name')->where('status', '=', 'Active')->get();
        return view('customer.create', compact('role'));
    }

    public function process(Request $request)
    {
        // dd($request);
        // $roleid = $request->role;
        $uuid = Str::uuid()->toString();
        $image = $uuid . '.' . $request->image->extension();
        $request->image->move(public_path('img/customer/'), $image);
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

    public function search(Request $request)
    {
        // dd($request);
        $response = $this->customerRepository->searchRecords($request);
        return $response;
    }
}
