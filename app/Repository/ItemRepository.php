<?php

namespace App\Repository;

use App\Models\item;
use App\Models\Item_Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use Illuminate\Support\Str;

class ItemRepository
{
    public function saveRecords($itemdata,$image)
    {
        // dd('reach here');
        $count =count($image);

        for($i=0; $i<$count; $i++){
            $uuid = Str::uuid()->toString();
            $images = $uuid.'.'.$image[$i]->extension();
            $image[$i]->move(public_path('img/item'),$images);
            if($i == 0){
                $itemphoto = new Item_Photo();
                $itemphoto->primaryphoto = True;
                $itemphoto->name = $itemdata[0]->name;
                $itemphoto->item_id = $itemdata[0]->id;
                $itemphoto->photo = $images;
                $itemphoto->uuid = $itemdata[0]->uuid;
                $itemphoto->status = 'Active';
                $itemphoto->save();
            }else{
                $itemphoto1 = new Item_Photo();
                $itemphoto1->primaryphoto = False;
                $itemphoto1->name = $itemdata[0]->name;
                $itemphoto1->item_id = $itemdata[0]->id;
                $itemphoto1->photo = $images;
                $itemphoto1->uuid = $itemdata[0]->uuid;
                $itemphoto1->status = 'Active';
                $itemphoto1->save();
            }
        }
        return redirect()->route('itemList');
    }

    public function searchRecords(Request $request){
        $searchData = [];

        if($request->search !=' ' && isset($request->search)){
            $search_name=['name','LIKE','%'.$request->search.'%'];
            array_push($searchData,$search_name);
        }

        if(isset($request->supplier)){
            $search_supplier=['supplier_id','LIKE','%'.$request->supplier.'%'];
            array_push($searchData,$search_supplier);
        }

        if(isset($request->subcategory)){
            $search_subcategory=['subcategory_id','LIKE','%'.$request->subcategory.'%'];
            array_push($searchData,$search_subcategory);
        }

        if(isset($request->brand)){
            $search_brand=['brand_id','LIKE','%'.$request->brand.'%'];
            array_push($searchData,$search_brand);
        }

        $supplier = DB::table('suppliers')->select('id', 'name')->where('status','=','Active')->get();
        $subcategory = DB::table('subcategories')->select('id', 'name')->where('status','=','Active')->get();
        $brand = DB::table('brands')->select('id', 'name')->where('status','=','Active')->get();

        $itemlist = Item::with('brand','supplier','subcategory','item_photo')->where($searchData)->orderby('items.id', 'DESC')->get();
        return view('item.itemlist',compact('itemlist','supplier','subcategory','brand'));
    }

    public function numberofpurchase($id){
        $item = Item::find($id);
        // dd($customer);
        $item->status='Inactive';
        $item->save();
        return redirect()->route('itemList');
    }
}
