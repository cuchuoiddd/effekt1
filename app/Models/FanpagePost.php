<?php

namespace App\Models;

use App\Constants\FanpageConstant;
use Illuminate\Database\Eloquent\Model;

class FanpagePost extends Model
{
    protected $guarded = [];

    public function fanpage(){
        return $this->belongsTo(Fanpage::class,'page_id','page_id');
    }

    public function search($search){
        $docs = self::when(isset($search['searchSource']) && $search['searchSource'] > FanpageConstant::FANPAGE_POST_NOT_USED,function ($q) use ($search){
            return $q->where('source_id','>',FanpageConstant::FANPAGE_POST_NOT_USED);
        })->when(isset($search['searchPage_Post']) && $search['searchPage_Post'],function ($q) use ($search){
            return $q->whereIn('page_id',$search['searchPage_Post'])->orWhere('post_id',$search['searchPage_Post']);
        })->orderBy('id','desc');
        return $docs;
    }
}
