<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

}
