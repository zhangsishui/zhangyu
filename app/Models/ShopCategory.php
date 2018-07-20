<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    //
    protected $fillable=[
      "name","intro","logo","status","sort"
    ];
}
