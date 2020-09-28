<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $guarded = [];

    public function search($search)
    {
        $docs = self::when(isset($search['searchName']) && $search['searchName'], function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search['searchName'] . '%');
        })->when(isset($search['searchType']) && $search['searchType'], function ($query) use ($search) {
            return $query->where('type', $search['searchType'] );
        })->when(isset($search['searchUser']) && $search['searchUser'], function ($query) use ($search) {
            return $query->where('user_id', $search['searchUser'] );
        })
        ->orderBy('id', 'desc');
        return $docs;
    }

    public function getProductTextAttribute(){
        $products = Product::whereIn('id',json_decode($this->product_id))->pluck('name')->toArray();
        return implode(', ',$products);
    }

    public function getUsername(){
        $users = User::whereIn('id',json_decode($this->sale_id))->pluck('name')->toArray();
        return implode(', ',$users);
    }

//    public function setProduct_idAttribute($product){
//        return json_encode($product);
//    }
}
