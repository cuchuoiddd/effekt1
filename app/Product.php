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

    public static function search($search){
        $docs = self::when(isset($search['searchTitle']),function ($q) use ($search){
            return $q->where('title_vn','like','%'.$search['searchTitle'].'%')->orWhere('title_en','like','%'.$search['searchTitle'].'%');
        })->orderByDesc('id');
        return $docs;
    }

    public function getCategoryTextAttribute(){
        if($this->category_id){
            $category_en = Category::whereIn('id',json_decode($this->category_id))->pluck('title_en')->toArray();
            $category_vn = Category::whereIn('id',json_decode($this->category_id))->pluck('title_vn')->toArray();
            $data['category_en'] = implode(', ',$category_en);
            $data['category_vn'] = implode(', ',$category_vn);
            return $data;
        }
    }
}
