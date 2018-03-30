<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Area extends Model
{
    protected $fillable =['code','name','level','parent_id'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function users()
    {
        return $this
            ->belongsToMany(User::class)
            ->withTimestamps();
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }

    public function children()
    {
        return $this->hasMany(Area::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Area::class, 'parent_id');
    }

    public static function getParents()
    {
        $parents = Area::select('id','name')->get();
       return $parents;
    }
}
