<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use App\Models\Subcategory;


class SubcategoryRepository{
    public function searchRecords(Request $request)
    {
        $search =[ 'name','LIKE','%' . $request->search . '%'];
        $search_category = ['category_id','LIKE','%' . $request->subcategory . '%'];
        $search_data = [$search,$search_category];
        $name = 'subcategories.name';
        $subcategorylist = Subcategory::with(['category'])
                        ->whereHas('category', function ($query){
                            $query->where('status', 'Active');
                            })
                        ->where($search_data)
                        ->orderBy('id', 'DESC')
                        ->get();
        $category = DB::table('categories')->select('id', 'name')->where('status','=','Active')->get();
        return view('subcategory.subcategorylist' ,compact('subcategorylist','category'));
    }
}
