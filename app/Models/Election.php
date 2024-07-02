<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Election extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function candidate(){
        return $this->hasMany(Candidate::class);
    }

    public function vote():HasMany{
        return $this->hasMany(Vote::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
    
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    


    public function casts(): array
    {
        return [
            'start_date' =>'date',
            'end_date' =>'date',
        ];
    }
}
