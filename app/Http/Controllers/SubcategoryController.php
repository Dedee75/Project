<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Repository\SubcategoryRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class SubcategoryController extends Controller
{
    private $subcategoryRepository;
    public function __construct(SubcategoryRepository $subcategoryrepository){
        $this->subcategoryRepository = $subcategoryrepository;

    }

    public function subcategorylist(){
        $subcategorylist = Subcategory::with(['category','staff'])->whereHas('category', function ($query) {
            $query->where('subcategories.status', 'Active');
        })->get();
        // dd($subcategorylist[0]->staff);
        return view('subcategory.subcategorylist', compact('subcategorylist'));
    }

    public function subcategoryregister(){
        $category = DB::table('categories')->select('id', 'name')->where('status','=','Active')->get();
        // dd($role);
        return view('subcategory.subcategoryregister',compact('category'));
    }

    public function subcategoryregisterprocess(Request $request){

        // dd($request);
        $uuid = Str::uuid()->toString();
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->description = $request->description;
        $subcategory->staff_id = auth('admin')->user()->id;
        $subcategory->date = Carbon::now();
        $subcategory->status = "Active";
        $subcategory->uuid = $uuid;
        $subcategory->save();

        return redirect()->route('subcategoryList');
    }

    public function subcategoryedit($id){
        // dd($id);
        $category = DB::table('categories')->select('id', 'name')->where('status','=','Active')->get();

        $subcategory = Subcategory::find($id);
        return view('subcategory.subcategoryregister',compact('subcategory', 'category'));
    }

    public function updateprocess(Request $request){
        $uuid = Str::uuid()->toString();
        $subcategory = Subcategory::find($request->id);
        // dd($people);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->description = $request->description;
        $subcategory->staff_id = auth('admin')->user()->id;
        $subcategory->date =  Carbon::now();
        $subcategory->update();
        return redirect()->route('subcategoryList');

    }

    public function subcategorydelete($id){
        $subcategory = Subcategory::find($id);
        $subcategory->status='Inactive';
        $subcategory->save();
        return redirect()->route('subcategoryList');
    }

    public function search(Request $request){
        // dd($request);
        $response = $this->subcategoryRepository->searchRecords($request);
        return $response;
    }

}
