<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\SavePostRequest;
use App\Post;
use App\Role;
use App\Stat;
use App\Tag;
use Auth;
use Cache;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Laravel\Passport\Bridge\User;


class PostController extends Controller
{
	protected $upload;

	public function __construct(UploadService $upload)
	{
		$this->upload = $upload;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// \DB::enableQueryLog();
		$tags = Tag::all();
		$stats = Stat::all();
		$roles = Role::all();
//		$posts = Cache::rememberForever('all-posts', function() {
		$posts = Post::latest('created_at')->paginate(10);
//		});

		//print_r( \DB::getQueryLog() );
		$pageConfigs = [
			'pageHeader' => false,
			'contentLayout' => "content-left-sidebar",
			'bodyClass' => 'email-application',
		];

		return view('post.index')
			->with('posts', $posts)
			->with('title', 'Všetky tasky')
			->with('tags', $tags)
			->with('stats', $stats)
			->with('roles', $roles)
			->with('pageConfigs', $pageConfigs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$tags = Tag::all();
		$stats = Stat::all();


		$pageConfigs = [
			'pageHeader' => false,
			'contentLayout' => "content-left-sidebar",
			'bodyClass' => 'email-application',
		];

		return view('post.create')
			->with('title', 'Add new post')
			->with('tags', $tags)
			->with('stats', $stats)
		->with('pageConfigs', $pageConfigs);
	}


	/**
	 * Store a newly created resource in storage.
	 * hint: VALIDATION happens in Requests/SavePostRequest
	 *
	 * @param SavePostRequest|Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(SavePostRequest $request)
	{

		// create new post for this user
		$post = $this->createPost($request);

		// success message
//		flash()->success('yay!');

		$name = 'marcel';
		$email = 'marcelhason@gmail.com';
		$title =  $post->title ;
		$pid = $post->id;
		$content = $post->text;

		\Mail::send('emails.visitors_email', ['name' => $name, 'email' => $email, 'title' => $title, 'content' => $content], function ($message) use ($title, $pid ) {

			$message->to('marcelhason@gmail.com')->subject('#'.$pid.'// >> '.$title);
		});


		// redirect to post
		return redirect()->route('post.show', $post->slug);
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug)
	{
		$post = Post::whereSlug($slug)
		            ->firstOrFail();
		$tags = Tag::all();
		$stats = Stat::all();

		$post->stats;
		$post->tags;

//return $post->user;
//
//		$user = User::find(1);
//		return $post->stats;

		return view('post.show')
			->with('post', $post);
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		$tags = Tag::all();
		$stats = Stat::all();
		// add tags to post model
		$post->stats;
		$post->tags;
//		return $post->stats[0]->id;
		// only owner can see the edit for
		$this->authorize('edit-post', $post);


		return view('post.edit', [
			'title' => 'Edit post',
			'post'  => $post,
			'tags' => $tags,
			'stats' => $stats,
		]);
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param SavePostRequest|Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(SavePostRequest $request, $id)
	{
		// grab post
		$post = Post::findOrFail($id);
		$tags = Tag::all();
		$stats = Stat::all();
		// update post
		$this->authorize('edit-post', $post);
		$post->update( $request->all() );

		// attach tags
		$this->syncTags($post, $request->get('tags'));

		// attach stats
		$this->syncStats($post, $request->get('stats'));

		// upload files
		$this->uploadFiles($post, $request->file('items'));

		// redirect to post

		flash()->success(' Úpravy uložené! ');


		return redirect()->route('post.show', $post->slug);
	}



	/**
	 * Show form for removing specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete($id)
	{
		$post = Post::findOrFail($id);

		// only owner can see the edit for
		$this->authorize('edit-post', $post);

		return view('post.delete')
			->with('post', $post);
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Request $request, $id )
	{
		$post = Post::findOrFail($id);

		// if authorized, delete
		$this->authorize('edit-post', $post);
		$post->delete();


		$this->syncTags($post, $request->get('comment'));
		// attach tags
		$this->syncTags($post, $request->get('tags'));

		// attach status
		$this->syncStats($post, $request->get('stats'));

		// upload files
		$this->uploadFiles($post, $request->file('items'));


		// remove files
		\File::deleteDirectory( storage_path('posts/' . $post->id) );

		// redirect home
//		flash()->success("it's gone!");
		return redirect('/');
	}



	/**
	 * Sync tags for this post
	 *
	 * @param $post
	 * @param $tags
	 */
	private function syncTags($post, $tags)
	{
		$post->tags()->sync($tags ?: []);
	}


	private function syncStats($post, $stats)
	{
		$post->stats()->sync($stats ?: []);
	}



	/**
	 * Upload files for this post
	 *
	 * @param $post
	 * @param $files
	 */
	private function uploadFiles($post, $files)
	{
		if ( $files ) foreach ( $files as $file )
		{
			if ( !$file || !$file->isValid() ) continue;

			$this->upload->saveFile($post, $file);
		}
	}



	/**
	 * Create new Post
	 *
	 * @param SavePostRequest $request
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	private function createPost(SavePostRequest $request)
	{
		// create new post for this user
		$post = Auth::user()->posts()->create($request->all());

		// attach tags
		$this->syncTags($post, $request->get('tags'));

		// attach status
		$this->syncStats($post, $request->get('stats'));

		// upload files
		$this->uploadFiles($post, $request->file('items'));

		return $post;
	}

	public function dropDownShow(Request $request)
	{
		$stat = Stat::pluck('stat', 'id');
		$selectedID = 2;
		return view('post.edit', compact('stat'));
	}

}
