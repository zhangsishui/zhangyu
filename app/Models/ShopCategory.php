<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ShopCategory extends Authenticatable
{
    //
    protected $fillable=[
      "name","intro","logo","status","sort"
    ];
}
