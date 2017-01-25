<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopImages extends Model
{
    protected $table = 'shopimages';

    protected $fillable = [
        'image_id',
        'path',
    ];


}
