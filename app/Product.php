<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function people(){
        return $this->belongsTo(People::class);
    }

    public function getPeopleVN(){
        $people = People::whereIn('id',json_decode($this->design_team))->pluck('full_name_vn')->toArray();
        return implode(', ',$people);
    }
    public function getPeopleEN(){
        $people = People::whereIn('id',json_decode($this->design_team))->pluck('full_name_en')->toArray();
        return implode(', ',$people);
    }
}
