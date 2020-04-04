<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name','email'];
    protected $hidden = ['password'];
    protected $table = 'customers';
    protected $guarded = [];

    
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}

