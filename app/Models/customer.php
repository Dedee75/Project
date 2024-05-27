<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class customer extends Model
{
    // use HasFactory;
    protected $table = 'customers';

    public function people():BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
