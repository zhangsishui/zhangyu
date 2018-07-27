<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    //
    protected $fillable = [
        'shop_category_id', 'shop_name', 'shop_img','shop_rating','brand','on_time','fengniao',
        'bao','piao','zhun','start_send','send_cost','notice','discount','status',
    ];
    public function shop_category(){
        return $this->belongsTo(ShopCategory::class,"shop_category_id");
    }
    public function user(){
        return $this->hasOne(User::class,"shop_id");
    }
}
