<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    protected $fillable = ['user_id','team_id','content'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
    public function team () {
        return $this->belongsTo(Team::class);
    }
}
