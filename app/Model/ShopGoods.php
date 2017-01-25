<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

//use App\Model\ShopCategories;


class ShopGoods extends Model
{

    protected $table = 'items';

    protected $fillable = [
        'title',
        'categoriy_id',
        'image',
        'new',
        'sale',        
        'published',       
        
    ];

//    public function scopeLast($query)
//    {
//        $query->orderBy('id', 'desc')->limit(4);
//    }

// метод объединения двух таблиц
    public function categories()
    {

//        dd("asdasda");

        // обединение один к одному модели ShopCategories.id и ShopGoods.categoriy_id
        return $this->hasOne('App\Model\ShopCategories','id','categoriy_id');
    }

    public function shopimages()
    {
//      обединение один к одному модели ShopImages.id и ShopGoods.categoriy_id
        return $this->hasMany('App\Model\ShopImages','image_id','id');
    }

    public function shopimages1()
    {
//      обединение один к одному модели ShopImages.id и ShopGoods.categoriy_id
        return DB::table('items')
            ->join('shopimages','items.id','=','shopimages.image_id')
            ->select('shopimages.path')->get();
    }


// метод возвращает связанные данные товара с категорией товара по id товара
    public static function catsItems()
    {
        return DB::table('items')
            ->join('categories','items.categoriy_id','=','categories.id')
            ->select('items.*','categories.title','categories.url')->get();
    }   

// метод возвращает связанные данные товара с категорией товара по id товара
    public static function catId($id)
    {
        return DB::table('items')->where('items.categoriy_id','=',$id)
            ->join('categories','items.categoriy_id','=','categories.id')
            ->select('items.*','categories.title','categories.url')->get();
    }


}