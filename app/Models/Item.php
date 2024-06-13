<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    // use HasFactory;
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function staff():HasOne
    {
        return $this->hasone(Admin::class,'id');
    }

    public function subcategory():BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand():HasOne
    {
        return $this->hasone(Brand::class, 'id');
    }

    public function item_photo():HasOne
    {
        return $this->hasone(Item_Photo::class, 'item_id','id');
    }

}
