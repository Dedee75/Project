<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Repository\BrandRepository;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
    private $brandRepository;
    public function  __construct(BrandRepository $brandrepository){
        $this->brandRepository = $brandrepository;
    }
    public function brandlist(){
        // $brandlist = Brand::with(['supplier','staff','people'])
        // ->whereHas('supplier',function ($query) {
        //     $query->where('brands.status', 'Active');
        // })->get();

        // ->whereHas('people',function ($query) {
        //     $query->where('brands.status', 'Active');
        // })

        // ->whereHas('staff',function ($query) {
        //     $query->where('brands.status', 'Active');
        // })


        // dd($brandlist);
        $brandlist = DB::table('brands')
        // ->join('brands', 'brands.id','=','brand_id')
        // ->join('subcategories','subcategories.id','=', 'subcategory_id')
        ->join('suppliers', 'suppliers.id','=','brands.supplier_id')
        ->join('staff','staff.person_id','=','brands.staff_id')
        ->join('people','people.id', '=','staff.person_id')
        ->where('brands.status','=', 'Active')
        ->select('brands.*','people.name as staffname','suppliers.name as suppliername')->get();
        // dd($brandlist);
        return view('brand.brandlist', compact('brandlist'));
    }

    public function brandregister(){
        $supplier = DB::table('suppliers')->select('id', 'name')->where('status','=','Active')->get();
        // dd($role);
        return view('brand.create' , compact('supplier'));
    }

    public function brandregisterprocess(Request $request):RedirectResponse{

        $validated = $request->validate([
            'name' => 'required|string|max:255',

        ]);

        // dd($request);
        // $subcategoryid= $request->supplier;
        $uuid = Str::uuid()->toString();
        $brand = new Brand();
        $brand->supplier_id = $request->supplier;
        $brand->name = $request->name;
        $brand->date = Carbon::now();
        $brand->staff_id = auth('admin')->user()->id;
        $brand->status = "Active";
        $brand->uuid = $uuid;
        $brand->save();
        return redirect()->route('brandList');
        // $response = $this->brandRepository->saveRecord($subcategoryid,$uuid);
        // return $response;


        // return redirect()->route('brandList');
    }

    public function brandedit($id){
        // dd($id);
        $supplier = DB::table('suppliers')->select('id', 'name')->where('status','=','Active')->get();

        $brand = Brand::find($id);
        return view('brand.create',compact('supplier', 'brand'));
    }

    public function updateprocess(Request $request):RedirectResponse{

        $validated = $request->validate([
            'name' => 'required|string|max:255',

        ]);

        // $uuid = Str::uuid()->toString();
        $brand = Brand::find($request->id);
            // dd($people);
        $brand->name = $request->name;
        // $brand->id = $request->id;
        $brand->staff_id = auth('admin')->user()->id;
        $brand->update();
        return redirect()->route('brandList');
    }

    public function branddelete($id){
        $brand = Brand::find($id);
        $brand->status='Inactive';
        $brand->save();
        return redirect()->route('brandList');
    }

    public function search(Request $request){
        // dd($request);
        $response = $this->brandRepository->searchRecords($request);
        return $response;
    }

}
