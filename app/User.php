<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
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

    public static function rulesProfile()
    {
        return [
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => "required",
            'password_old' => "required",
            'password_confirmation' => "required",
        ];
    }

    public static function rulesCreate()
    {
        return [
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => "required",
            'password_confirmation' => "required",
        ];
    }
}
