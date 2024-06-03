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
}
