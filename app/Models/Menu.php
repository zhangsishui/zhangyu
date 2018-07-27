<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Menu extends Authenticatable
{
    //
    protected $fillable=[
        "goods_name","rating","shop_id","category_id","goods_price","description","month_sales","rating_count",
        "tips","satisfy_count","satisfy_rate","goods_img","status",
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }

    public function menuCategory()
    {
        return $this->belongsTo(MenuCategory::class,"category_id");
    }

}
