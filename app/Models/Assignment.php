<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'question', 'points', 'ending_date', 'team_id'
    ];

    protected $casts = [
        'ending_date' => 'datetime',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class , 'uploaded', 'assignment_id')->withPivot(['file_path', 'status', 'grade'])->withTimestamps();
    }
}
