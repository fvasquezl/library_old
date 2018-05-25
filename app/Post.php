<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable=['title','url','excerpt'];
    protected $dates=['published_at'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = Str::slug($title);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now())
            ->latest('published_at');
    }

    public function scopeFromSearch($query,string $search=null)
    {
        if (trim ($search !='')) {
            $searchItems = array_map('strval', explode(' ', $search));
            $query->where(function ($q) use ($searchItems){
                foreach ($searchItems as $item){
                    $q->orWhere(DB::raw("CONCAT(`title`,' ',`excerpt`)"),'LIKE',"%$item%");
                }
            });

        }
    }

    public function scopeFromAreas($query=null)
    {
        $area = auth()->user()->area;
        $areas = array_prepend($area->getAllChildrenFromArea($area),1);

        $query->unless(auth()->user()->isAdmin(),function ($q) use ($areas){
            $q->whereHas('areas',function ($q1) use ($areas){
            $q1->whereIn('area_id',$areas);
            });
        });
    }


}
