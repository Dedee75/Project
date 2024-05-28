<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandlist(){
        $brandlist = Brand::with(['supplier','staff'])->whereHas('supplier', function ($query) {
            $query->where('suppliers.status', 'Active');
        })->get();
        // dd($brandlist[0]->staff);
        return view('brand.brandlist', compact('brandlist'));
    }
}
