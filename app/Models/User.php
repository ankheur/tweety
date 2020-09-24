<?php

namespace App\Models;

use App\Traits\Followable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;



class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getAvatarAttribute($path)
    {
        if (!empty($path)) {
            return asset('storage/' . $path);
        }
        return 'https://api.adorable.io/avatars/200/' . $this->name . '@adorable.png';
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    public function timeline() 
    {
        $follows = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $follows)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->withLikes()
            ->paginate(50);
    }


    public function tweets() 
    {
        return $this->hasMany(Tweet::class)->latest();
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }
}
