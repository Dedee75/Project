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
        $name = 'subcategories.name';
        $subcategorylist = Subcategory::with(['category'    ])
        ->whereHas('category', function ($query) use ($request){
            $search = '%' . $request->search . '%';
            $query->where('status', 'Active')
            ->where(function ($subQuery) use ($search) {
                $subQuery->where('name', 'LIKE', $search)
                         ->orWhere('description', 'LIKE', $search);

            });

        }) ->orderBy('id', 'DESC')
        ->get();
        // $subcategorylist = Subcategory::with('category')
        //                 ->where([
        //                     [],
        //                     []])

        // }) ->orderBy('id', 'DESC')
        // ->get();

        // dd($subcategorylist->toArray());

        return view('subcategory.subcategorylist' ,compact('subcategorylist'));
    }
}
