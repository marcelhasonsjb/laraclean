<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 */
class Role extends Model
{
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
//	public $timestamps = false;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'guard_name'];


	/*
	 * Many users can have a role
	 */
	public function users()
	{
		return $this->hasMany('App\User');
	}

	public function posts()
	{
		return $this->belongsToMany('App\Post');
	}
}
