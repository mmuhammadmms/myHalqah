<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohalla extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'halqah_id'
    ];

    public function halqah(){
        return $this->belongsTo(Halqah::class);
    }

    public function house(){
        return $this->hasMany(House::class);
    }
}
