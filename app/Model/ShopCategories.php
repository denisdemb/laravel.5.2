<?php namespace App\Model;

use Baum\Node;

class ShopCategories extends Node
{

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'published',
    ];

//    public function scopeLast($query)
//    {
//        $query->orderBy('id', 'desc')->limit(4);
//    }


//    public function items()
//    {
//        return $this->belongsTo('App\Model\ShopGoods','categoriy_id');
//    }

}