<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	/**
	 * These attributes are NOT mass assignable
	 *
	 * @var array
	 */
	protected $guarded = [ 'id' ];


	/**
	 * Get all of the owning imageable models.
	 */
	public function fileable()
	{
		return $this->morphTo();
	}


	/**
	 * Save the new file to disk and database
	 *
	 * @param  $post
	 * @param  $file
	 * @return static
	 */
	/*public static function saveFile( $post, $file )
	{
		// create new file
		$filepath  = storage_path('posts/' . $post->id);
		$extension = $file->getClientOriginalExtension();
		$filename  = str_replace(
			".$extension",
			"-" . rand(11111, 99999) . ".$extension",
			$file->getClientOriginalName()
		);

		// save the file
		$file->move($filepath, $filename);

		// store it in the db
		return File::create([
			'post_id'  => $post->id,
			'name'     => $file->getClientOriginalName(),
			'filename' => $filename,
			'mime'     => $file->getClientMimeType(),
			'ext'      => $extension,
			'size'     => $file->getClientSize(),
		]);
	}*/

}
