<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

	protected $table = 'news';

	protected $fillable = [
		'title',
		'date',
		'published',
		'image',
		'text',
	];

	public function getActive()
	{
		// для вызова пагинации используется функция paginate(количество элементов на странице)
		return $this->published()->latest()->paginate(4);
	}

	public function scopePublished($query)
	{
		$query->where(['published'=>'1']);
	}
	
	
	public function scopeLast($query)
	{
		$query->orderBy('date', 'desc')->limit(4);
	}

}