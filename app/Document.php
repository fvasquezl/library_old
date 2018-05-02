<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Document extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now())
            ->latest('published_at');
    }


}
