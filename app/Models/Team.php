<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'joining', 'adding'];

    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'members', 'team_id');
    }


    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'team_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'team_id');
    }
}
