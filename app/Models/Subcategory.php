<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subcategory extends Model
{
    // use HasFactory;

    public function category():HasOne
    {
        return $this->hasone(category::class,'id');
    }

    public function staff():HasOne
    {
        return $this->hasone(Staff::class,'id');
    }
}
