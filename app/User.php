<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

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

    /**
     * Chek admin
     * @return boolean
     */

    public function isAdmin(){
        return $this->role === "admin";
    }

    /**
     * Check staff
     * @return boolean
     */

    public function isStaff(){
        return $this->role === "staff";
    }

    public function products(){
        return $this->hasMany(Product::class,"added_by");
    }

    public function categories(){
        return $this->hasMany(Category::class,"added_by");
    }
}
