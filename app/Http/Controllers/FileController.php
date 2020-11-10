<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
	public function download($id)
	{

		$file = \App\File::findOrFail($id);

		return response()->download(
			storage_path("posts/{$file->fileable_id}/{$file->filename}")
		);
	}
}
