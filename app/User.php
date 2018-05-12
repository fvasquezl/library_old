<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','url','email','password','position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles()
    {
        return $this
            ->belongsToMany(Role::class);
    }

    public function areas()
    {
        return $this
            ->belongsToMany(Area::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
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

    public function createPost(array $array)
    {
        $post = new Post($array);
        $this->posts()->save($post);
        return $post;
    }

}
