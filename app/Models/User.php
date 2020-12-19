<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'specialization',
        'username',
        'gender',
        'status',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teams() {
        return $this->hasMany(Team::class,'manager_id');
    }
    public function teamsjoined() {
        return $this->belongsToMany(Team::class,'members','user_id');
    }
<<<<<<< HEAD

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class, 'uploaded', 'user_id')->withPivot(['file_path', 'status', 'grade'])->withTimestamps();
    }

=======
    public function post () {
        return $this->hasMany(Post::class,'user_id');
    }
>>>>>>> c8c3a83485c5fc78127e12d389ef03a474cb2a77
}
