<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TopSlider extends Model
{

    protected $table = 'topsliders';

    protected $fillable = [
        'title',
        'link',
        'published',
        'image'
    ];

    public function scopeLast($query)
    {
        $query->orderBy('id', 'desc')->limit(4);
    }

}