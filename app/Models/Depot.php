<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depot extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function getCity()
    {
        return $this->belongsTo(Location::class, 'city', 'code');
    }

    public function getDistrict()
    {
        return $this->belongsTo(Location::class, 'district', 'code');
    }

    public function getWards()
    {
        return $this->belongsTo(Location::class, 'wards', 'code');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
