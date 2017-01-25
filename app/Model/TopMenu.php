<?php namespace App\Model;

//use Illuminate\Database\Eloquent\Model;
use Baum\Node;

class TopMenu extends Node
{

    protected $table = 'topmenu';

    protected $fillable = [
        'title',
        'link',
        'published',        
    ];

    public function scopeLast($query)
    {
        $query->orderBy('id', 'desc')->limit(4);
    }

}