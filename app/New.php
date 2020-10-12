<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];

    public static function search($search){
        $docs = self::when(isset($search['searchTitle']),function ($q) use ($search){
            return $q->where('title_vn','like','%'.$search['searchTitle'].'%')->orWhere('title_en','like','%'.$search['searchTitle'].'%');
        })->orderByDesc('date');
        return $docs;
    }
}
