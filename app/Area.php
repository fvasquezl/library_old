<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Area extends Model
{
    protected $fillable = ['code', 'name', 'level', 'parent_id'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function users()
    {
        return $this
            ->hasMany(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function create(array $attributes = [])
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
        $parents = Area::select('id', 'name')->get();
        return $parents;
    }

    public static function getLevelParents($id)
    {
        return Area::where(function ($q) use ($id) {

            $q->where('level', '<', $id)->where('parent_id', '!=', null);
            if ($id == 0) {
                $q->where('level', '>', 0);
            }
            if ($id == 1) {
                $q->where('level', '=', 0);
            }
            if ($id > 1) {
                $q->where('level', '!=', 0);
            }
        })->get();
    }


    /**
     * @return \Illuminate\Support\Collection
     * Get all parent from a area
     */
    public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while (!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }


    public static function getAllChildrenFromArea($area)
    {
        $area_arr[]= $area->id;
        $areas = $area->children;

        foreach ($areas as $area)
        {
            if (is_array($area) || is_object($area)) {
                $area_arr[] = self::getAllChildrenFromArea($area);
            }
        }
        return array_flatten($area_arr);
    }



}
