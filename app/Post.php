<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $comments
 * @property mixed $user
 * @property mixed $tags
 * @property mixed $stats
 */
class Post extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'title', 'text', 'slug', 'status', 'mail_from', 'mail_date'];

	/**
	 * @var array
	 */
	protected $appends = ['teaser', 'datetime'];






	/**
	 * A post belongs to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}


	/**
	 * A post has many comments
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}


	/**
	 * A post can have many tags
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

	public function stats()
	{
		return $this->belongsToMany( 'App\Stat' );
	}
	/**
	 * A post can have many files
	 */
	public function files()
	{
		return $this->morphMany('App\File', 'fileable');
	}


	/**
	 * Create slug from title before storing to DB
	 *
	 * @param $value
	 */
	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;
		$this->attributes['slug']  = \Str::slug($value);
	}


	/**
	 * @param  $value
	 * @return bool|string
	 */
	public function getCreatedAtAttribute( $value )
	{
		switch ( App::getLocale() )
		{
			case 'sk' :
				return date('\d\ň\a j. m. Y \o G:i', strtotime( $value ));
				break;

			default :
				return date('j M Y, G:i', strtotime( $value ));
		}
	}


	/**
	 * @return bool|string
	 */
	public function getDatetimeAttribute()
	{
		return date('Y-m-d', strtotime($this->created_at));
	}


	/**
	 * @return string
	 */
	public function getTeaserAttribute()
	{
		return word_limiter( $this->text, 60 );
	}


	/**
	 * @return mixed|string
	 */
	public function getRichTextAttribute()
	{
		return add_paragraphs( filter_url( e($this->text) ) );
	}

}