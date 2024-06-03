<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item_Photo extends Model
{
    use HasFactory;

    public function item():HasOne
    {
        return $this->hasone(Item::class, 'id');
    }

}
