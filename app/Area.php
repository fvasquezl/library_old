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
            ->belongsToMany(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function create(array $attributes =[])
    {
        $attributes['level'] = -1;
        $attributes['parent_id'] = -1;
        $area = static::query()->create($attributes);
        return $area;
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

    public static function getLevelParents($id)
    {
        return  Area::where(function($q) use ($id){

            $q->where('level','<',$id)->where('parent_id','!=',null);
            if($id == 0){
                $q->where('level','>',0);
            }
            if($id == 1){
                $q->where('level','=',0);
            }
            if($id > 1){
                $q->where('level','!=',0);
            }
        })->get();
    }
}
