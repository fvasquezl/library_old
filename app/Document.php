<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
