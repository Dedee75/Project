<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    // use HasFactory;
    public function supplier():HasOne
    {
        return $this->hasone(supplier::class,'id');
    }
    public function staff():HasOne{
        return $this->hasone(Staff::class, 'id');
    }
    public function people():HasOne{
        return $this->hasone(Person::class, 'id');
    }
}
