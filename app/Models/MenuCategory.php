<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MenuCategory extends Authenticatable
{
    //
    protected $fillable=[
        "name","type_accumulation","shop_id","description","is_selected",
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }
}
