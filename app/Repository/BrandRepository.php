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
    public function searchRecords($search)
    {
  dd($search);
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
}
