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
        if(isset($this->design_team) && $this->design_team){
            $people = People::whereIn('id',json_decode($this->design_team))->pluck('full_name_vn')->toArray();
            return implode(', ',$people);
        } else {
            return '';
        }
    }
    public function getPeopleEN(){
        if(isset($this->design_team) && $this->design_team){
            $people = People::whereIn('id',json_decode($this->design_team))->pluck('full_name_en')->toArray();
            return implode(', ',$people);
        } else {
            return '';
        }
    }
}
