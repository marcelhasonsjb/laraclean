<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
	public function show($id)
	{
		$tag = Tag::findOrFail($id);
		$validTags = $tag->posts()->paginate(10);

		$pageConfigs = [
			'pageHeader' => false,
			'contentLayout' => "content-left-sidebar",
			'bodyClass' => 'email-application',
		];


		return view('post.index')
			->with('tags', $tag)
			->with('title', "Tasky pridelené pre - {$tag->tag}")
			->with('posts', $validTags)
			->with('pageConfigs', $pageConfigs);
	}
}
