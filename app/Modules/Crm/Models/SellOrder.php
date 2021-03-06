<?php

namespace App\Modules\Crm\Models;

use App\Model\User\User;
use App\Modules\StoreInventory\Models\Stores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SellOrder extends Model
{
    protected $table = 'sell_orders';
    protected $guarded = [];

    const INV_NOT_CREATED = 1;
    const INV_CREATED = 2;

    public function maxSlNo($store_no)
    {
        $maxSn = $this->where('store_id', '=', $store_no)->max('max_sl_no');
        return $maxSn ? $maxSn + 1 : 1;
    }

    public static function totalOrderCount()
    {
        $data = DB::table('sell_orders')
            ->select(DB::raw('count(*) as total'))->first();
        return $data ? $data->total : 0;
    }

    public static function monthlyOrders($year, $month)
    {
        $store_id = User::getStoreId(auth()->user()->id);
        if ($store_id > 0) {
            $data = DB::table('sell_orders')
                ->select(DB::raw('sum(grand_total) as total'))
                ->where('store_id','=',$store_id)
                ->whereYear('date', '=', $year)
                ->whereMonth('date', '=', $month)->first();
            return $data ? round($data->total, 2) : 0;
        }
        else
        {
            $data = DB::table('sell_orders')
                ->select(DB::raw('sum(grand_total) as total'))
                ->whereYear('date', '=', $year)
                ->whereMonth('date', '=', $month)->first();
            return $data ? round($data->total, 2) : 0;
        }
    }

    public function store()
    {
        return $this->belongsTo(Stores::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class);
    }

    public function sellOrderDetails()
    {
        return $this->hasMany(SellOrderDetails::class, 'order_id');
    }
}
