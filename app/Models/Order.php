<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'shop_id', 'sn',
        'province', 'city', 'county',
        'address', 'tel',
        'name', 'total', 'status'
    ];

    public function getOrderStatusAttribute()
    {
        $arr = [
            -1 => "已取消", 0 => "代付款",
            1 => "待发货", 2 => "待确认",
            3 => "完成"
        ];
        return $arr[$this->status];
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, "shop_id");
    }

    public function goods()
    {
        return $this->hasMany(OrderGood::class, "order_id");
    }

    public function member()
    {
        return $this->belongsTo(Member::class,"user_id");
    }
}
