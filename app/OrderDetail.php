<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
