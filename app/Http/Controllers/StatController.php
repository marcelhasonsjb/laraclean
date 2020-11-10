<?php

namespace App\Http\Controllers;

use App\Post;
use App\Stat;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatController extends Controller
{
	public function show($id)
	{
		$stat = Stat::findOrFail($id);
		$validStatus = $stat->posts()->paginate(10);

		$pageConfigs = [
			'pageHeader' => false,
			'contentLayout' => "content-left-sidebar",
			'bodyClass' => 'email-application',
		];


		return view('post.index')
			->with('stats', $stat)
			->with('title', "Tasky pridelené pre - {$stat->statu}")
			->with('posts', $validStatus)
			->with('pageConfigs', $pageConfigs);
	}
}
