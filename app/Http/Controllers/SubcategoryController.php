<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Repository\SubcategoryRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class SubcategoryController extends Controller
{
    private $subcategoryRepository;
    public function __construct(SubcategoryRepository $subcategoryrepository){
        $this->subcategoryRepository = $subcategoryrepository;

    }

    public function subcategorylist(){
        $subcategory = DB::table('subcategories')->select('id', 'name')->where('status','=','Active')->get();
        $category = DB::table('categories')->select('id','name')->where('status','=','Active')->get();
        // dd($role);
        // $subcategorylist = Subcategory::with(['category','staff'])->orderBy('subcategories.id','DESC')->whereHas('category', function ($query) {
        //     $query->where('subcategories.status', 'Active');
        // })->get();
        $subcategorylist = DB::table('categories')
                            ->join('subcategories', 'subcategories.category_id', '=' , '.categories.id')
                            ->where('categories.status','=', 'Active')
                            ->select('subcategories.*', 'categories.name as categoryname')
                            ->orderByDesc('subcategories.id')
                            ->get();
        // dd($subcategorylist);
        return view('subcategory.subcategorylist', compact('subcategorylist','category'));
    }

    public function subcategoryregister(){
        $category = DB::table('categories')->select('id', 'name')->where('status','=','Active')->get();
        return view('subcategory.subcategoryregister',compact('category'));

    }

    public function subcategoryregisterprocess(Request $request):RedirectResponse{
//   dd($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            // 'password' => 'required|min:8|regex:#(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])#',
            // 'password_confirmation' => 'required|string|min:8|confirmed',
        ]);

//         dd($request);
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

    public function updateprocess(Request $request):RedirectResponse{

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            // 'password' => 'required|min:8|regex:#(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])#',
            // 'password_confirmation' => 'required|string|min:8|confirmed',
        ]);

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
        // dd($request->toArray());
        $response = $this->subcategoryRepository->searchRecords($request);
        return $response;
    }

}
