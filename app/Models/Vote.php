<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function election():BelongsTo{
        return $this->belongsTo(Election::class);
    }
    
    public function candidate():BelongsTo{
        return $this->belongsTo(Candidate::class);
    }
}
