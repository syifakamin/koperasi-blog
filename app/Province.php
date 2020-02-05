<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class Province extends Model
{
    protected $fillable = [] ;

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
