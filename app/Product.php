<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-success"> Draft</span>';
        }
        return '<span class="badge bg-green">Aktif</span>';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $guarded = [];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}

