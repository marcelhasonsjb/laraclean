<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;

class RoleController extends Controller
{
	public function show($id)
{
	$role = Role::findOrFail($id);

	$pageConfigs = [
		'pageHeader' => false,
		'contentLayout' => "content-left-sidebar",
		'bodyClass' => 'email-application',
	];

	return view('post.index')
		->with('role', $role)
		->with('title', "Tasky pridelené pre - {$role->role}")
		->with('pageConfigs', $pageConfigs);
}
}
