<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this
            ->belongsToMany(Role::class)
            ->withTimestamps();
    }

    public function areas()
    {
        return $this
            ->belongsToMany(Area::class)
            ->withTimestamps();
    }

    public function hasLevel($level)
    {
        $user = auth()->user();
        if( $user->areas->contains('level',$level) ){
            return true;
        }
        return false;
    }

    public function getAreaName($user)
    {
        return  $user->areas->pluck('code')->implode(', ');
    }
}
