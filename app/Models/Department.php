<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function election(){
        return $this->hasMany(Election::class);
    }
}
