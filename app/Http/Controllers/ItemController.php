<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Repository\ItemRepository;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{

    private $itemRepository;
    public function __construct(ItemRepository $itemrepository){
        $this->itemRepository = $itemrepository;

    }

    public function itemlist(){

        $supplier = DB::table('suppliers')->select('id', 'name')->where('status','=','Active')->get();
        $subcategory = DB::table('subcategories')->select('id', 'name')->where('status','=','Active')->get();
        $brand = DB::table('brands')->select('id', 'name')->where('status','=','Active')->get();

        // compact('supplier','subcategory','brand');

        // $itemlist = Item::with(['supplier','subcategory','brand','item_photo'])
        //     ->orderBy('items.id','DESC')
        //     ->whereHas('item_photo',function($query){
        //         $query->where([
        //             ['items.status' ,'=' ,'Active'],
        //             ['primaryphoto','=',1]
        //         ]);
        // })->get();
        $itemlist = DB::table('items')
                    ->join('item__photos','item__photos.item_id', '=', 'items.id')
                    ->join('brands','brands.id', '=', 'items.brand_id')
                    ->join('subcategories','subcategories.id', '=', 'items.subcategory_id')
                    ->join('suppliers','suppliers.id', '=', 'items.supplier_id')
                    ->where('item__photos.primaryphoto','=', 1)
                    ->where('items.status','=','Active')
                    ->select('items.*','item__photos.photo as photo','brands.name as brandname', 'subcategories.name as subcategory','suppliers.name as suppliername')
                    ->orderBy('items.id','DESC')
                    ->get();
        // dd($itemlist);
        return view('item.itemlist', compact('itemlist','supplier','subcategory','brand'));

    }
    public function itemregister(){
        $supplier = DB::table('suppliers')->select('id', 'name')->where('status','=','Active')->get();
        $subcategory = DB::table('subcategories')->select('id', 'name')->where('status','=','Active')->get();
        $brand = DB::table('brands')->select('id', 'name')->where('status','=','Active')->get();
        return view('item.create',compact('supplier','subcategory','brand'));
    }

    public function itemregisterprocess(Request $request):RedirectResponse{

        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'qty' => 'required|string|max:50',
        //     'sprice' => 'required|string|max:255',
        //     'pprice' => 'required|string|max:255',
        //     'desrciption' => 'required|string|max:255',
        //     // 'password' => 'required|min:8|regex:#(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])#',
        //     // 'password_confirmation' => 'required|string|min:8|confirmed',
        //     'image' => 'required',
        // ]);

        // dd($request);
        // $subcategoryid= $request->supplier;
        $uuid = Str::uuid()->toString();
        $item = new Item();
        $item->name = $request->name;
        $item->supplier_id = $request->supplier;
        $item->qty =$request->qty;
        $item->saleprice =$request->sprice;
        $item->date =Carbon::now();
        $item->purchaseprice =$request->pprice;
        $item->subcategory_id =$request->subcategory;
        $item->brand_id =$request->brand;
        $item->description =$request->description;
        $item->staff_id = auth('admin')->user()->id;
        $item->status = "Active";
        $item->uuid = $uuid;
        $item->save();
        $itemdata = Item::where('uuid',$uuid)->get();
        // dd($itemdata);
        $image = $request->image;

        $response = $this->itemRepository->saveRecords($itemdata,$image);
        return $response;


        // return redirect()->route('brandList');
    }

    public function itemedit($id){
        // dd($id);
        $supplier = DB::table('suppliers')->select('id', 'name')->where('status','=','Active')->get();
        $subcategory = DB::table('subcategories')->select('id', 'name')->where('status','=','Active')->get();
        $brand = DB::table('brands')->select('id', 'name')->where('status','=','Active')->get();

        $item = Item::find($id);
        return view('item.create',compact('supplier','subcategory','brand','item'));
    }

    public function updateprocess(Request $request):RedirectResponse{

        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'qty' => 'required|string|max:50',
        //     'sprice' => 'required|string|max:255',
        //     'pprice' => 'required|string|max:255',
        //     'desrciption' => 'required|string|max:255',
        //     // 'password' => 'required|min:8|regex:#(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])#',
        //     // 'password_confirmation' => 'required|string|min:8|confirmed',
        //     'image' => 'required',
        // ]);

        $item = Item::find($request->id);
        $item->name = $request->name;
        $item->supplier_id = $request->supplier;
        $item->qty =$request->qty;
        $item->saleprice =$request->sprice;
        $item->purchaseprice =$request->pprice;
        $item->subcategory_id =$request->subcategory;
        $item->brand_id =$request->brand;
        $item->description =$request->description;
        $item->staff_id = auth('admin')->user()->id;
        $item->save();

        return redirect()->route('itemList');
    }

    public function itemdelete($id){
        $item = Item::find($id);
        $item->status='Inactive';
        $item->save();
        $response = $this->itemRepository->numberofpurchase($id);
        return $response;
    }

    public function search(Request $request){
        // dd($request);
        $response = $this->itemRepository->searchRecords($request);
        return $response;
    }

    
}
