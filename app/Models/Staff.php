<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Staff extends Model
{
    // use HasFactory;
    protected $table = 'staff';
    protected $fillable = [
        'people_id',
        'role_id',
        'status',
        'uuid'

    ];

    public function people():BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function subcategory():BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

}
