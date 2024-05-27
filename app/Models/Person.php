<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Person extends Authenticatable
{
    // use HasFactory;
    protected $table = 'people';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'email',
        'age',
        'phonenumber',
        'address',
        'password',
        'image',
        'uuid',
        'status'
    ];
    // public function staff(){
    //     return $this->hasOne(Staff::class, 'person_id');
    // }
    public function customer():HasOne
    {
        return $this->hasone(customer::class,'id');
    }

    public function staff():HasOne
    {
        return $this->hasone(Staff::class,'id');
    }
}
