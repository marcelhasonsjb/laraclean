<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::with('user')->latest('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $request->validate([
		    'title' => 'required',
		    'slug' => 'required|unique:posts',
		    'text' => 'required',
		    'user_id' => 'required|integer|exists:users,id'
	    ]);

	    $post = Post::create($request->all());

	    return response()->json([
		    'message' => 'post created',
		    'post' => $post,
	    ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $request->validate([
		    'title' => 'required',
		    'slug' => "required|unique:posts,slug,{$id}",
		    'text' => 'required',
		    'user_id' => 'required|integer|exists:users,id'
	    ]);
			$post = Post::findOrFail($id);
			$post ->update(
			$request->all()
			);

	    return response()->json([
		    'message' => 'post updated',
		    'post' => $post,
	    ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$post = Post::findOrFail($id);

	    $post->delete();

	    return response()->json([
		    'message' => 'post deleted'
	    ], 200);
    }
}
