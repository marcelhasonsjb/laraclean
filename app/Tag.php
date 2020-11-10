<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Tag extends Model
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
	public $timestamps = false;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['tag'];


	/**
	 * A tag can belong to many posts
	 */
	public function posts()
	{
		return $this->belongsToMany('App\Post')->orderBy('created_at', 'asc');
	}
}
