<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function party(){
        return $this->belongsTo(Party::class);
    }

    public function election(){
        return $this->belongsTo(Election::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function vote():HasMany{
        return $this->hasMany(Vote::class);
    }
    
}
