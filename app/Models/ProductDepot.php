<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDepot extends Model
{
    protected $guarded = [];

    public static function search($input)
    {
        $data = self::when(!empty($input['depot_id']), function ($q) use ($input) {
            $q->where('depot_id', $input['depot_id']);
        })->when(!empty($input['product_id']), function ($q) use ($input) {
            $q->where('product_id', $input['product_id']);
        })->orderByDesc('updated_at');

        return $data;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function depot()
    {
        return $this->belongsTo(Depot::class, 'depot_id');
    }
}
