<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ['id'];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_code','code');
    }
}
