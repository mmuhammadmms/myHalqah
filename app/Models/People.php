<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'no_phone',
        'exp',
        'mohalla_id'
    ];

    public function mohalla(){
        return $this->belongsTo(Mohalla::class);
    }
}
