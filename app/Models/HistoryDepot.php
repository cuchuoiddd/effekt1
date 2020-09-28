<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Functions;

class HistoryDepot extends Model
{
    protected $guarded = [];

    public static function search($input)
    {
        $data = self::when(!empty($input['depot_id']), function ($q) use ($input) {
            $q->where('depot_id', $input['depot_id']);
        })->when(!empty($input['status']), function ($q) use ($input) {
            $q->where('status', $input['status']);
        })->when(!empty($input['product_id']), function ($q) use ($input) {
            $q->where('product_id', $input['product_id']);
        })->when(!empty($input['code_order']), function ($q) use ($input) {
            $q->where('code_order', $input['code_order']);
        })
            ->when(isset($input['start_date']) && isset($input['end_date']), function ($q) use ($input) {
                $q->whereBetween('created_at', [
                    Functions::yearMonthDay($input['start_date']) . " 00:00:00",
                    Functions::yearMonthDay($input['end_date']) . " 23:59:59",
                ]);
            })->orderByDesc('id');

        return $data;
    }

    public function depot()
    {
        return $this->belongsTo(Depot::class, 'depot_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
