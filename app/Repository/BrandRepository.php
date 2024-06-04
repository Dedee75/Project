<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use App\Models\Brand;
use App\Models\Brand_subcategory;

class BrandRepository
{
    public function searchRecords(Request $request)
    {
        $name = 'brands.name';
        $brandlist = DB::table('brands')
        // ->join('brands', 'brands.id','=','brand_id')
        // ->join('subcategories','subcategories.id','=', 'subcategory_id')
        ->join('suppliers', 'suppliers.id','=','brands.supplier_id')
        ->join('staff','staff.person_id','=','brands.staff_id')
        ->join('people','people.id', '=','staff.person_id')
        ->where('brands.status','=', 'Active')
        ->where($name,'LIKE','%'.$request->search.'%')

        ->select('brands.*','people.name as staffname','suppliers.name as suppliername')->get();

        // $brandlist = DB::table('brands')
        //         ->where('status','=','Active')
        //         // ->orderBy('brand.id','DESC')
        //         ->where($name,'LIKE','%'.$request->search.'%')
        //         // ->orWhere($suppliername,'LIKE','%'.$request->search.'%')
        //         // ->orWhere($staff,'LIKE','%'.$request->search.'%')
        //         ->select('brands.*')
        //         ->get();

        return view('brand.brandlist' ,compact('brandlist'));
    }
}
    // public function saveRecord ($subcategoryid,$uuid){
    //     $brandid = Brand::where('uuid',$uuid)->get();
    //     // dd($brandid[0]->id);
    //     $brand_subcategory = new Brand_subcategory();
    //     $brand_subcategory->subcategory_id = $subcategoryid;
    //     $brand_subcategory->brand_id = $brandid[0]->id;
    //     $brand_subcategory->uuid = $uuid;
    //     $brand_subcategory->status = "Active";
    //     $brand_subcategory->save();
    //      return redirect()->route('brandList');



    // }

