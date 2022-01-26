<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'markaz_id'
    ];

    public function markaz(){
        return $this->belongsTo(Markaz::class);
    }

    public function zone(){
        return $this->hasMany(Zone::class);
    }
}
