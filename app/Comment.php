<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 */
class Comment extends Model
{
	protected $fillable = ['text', 'post_id'];

//	protected $guarded = ['id'];

	/**
	 * @param  $value
	 * @return bool|string
	 */
	public function getCreatedAtAttribute( $value )
	{
		return date('j M Y, G:i', strtotime( $value ));
	}


	/**
	 * A comment belongs to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
