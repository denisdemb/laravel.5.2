<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $table = 'pages';

    protected $fillable = [
        'title',
        'date',
        'published',
        'text',
    ];

    public function scopeLast($query)
    {
        $query->orderBy('date', 'desc')->limit(4);
    }

}