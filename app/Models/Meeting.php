<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = ['team_id','tokens'];

    public function Team () {
        return $this->belongsTo(Team::class);
    }
}
