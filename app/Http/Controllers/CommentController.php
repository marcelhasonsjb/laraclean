<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\{
	Support\Carbon
};

class CommentController extends Controller
{
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// ... shitty validation
		if ( ! $request->get('text') )
		{
			if ( $request->ajax() ) {
				return response()->json([
					'error' => 'no text'
				]);
			}

			return back()->withErrors([ 'text' => 'write something' ]);
		}

		$post = Post::findOrFail( $request->get('post_id') );

		$comment = Comment::create([
			'post_id' => $post->id,
			'user_id' => \Auth::id(),
			'text'    => $request->get('text'),
			'mail_date' => Carbon::now(),
		]);

		if ( $request->ajax() )
		{
			return response()->json([
				'id' => $comment->id,
				'message' => 'all was well',
			], 200);
		}

		$name = 'marcel';
		$email = 'marcelhason@gmail.com';
		$title =  $post->title ;
		$pid = $post->id;
		$cid = $comment->id;
		$content = $comment->text;
		$cmail = $post->mail_from;

		\Mail::send('emails.visitors_email', ['name' => $name, 'email' => $email, 'title' => $title, 'content' => $content], function ($message) use ($cmail, $title, $pid, $cid) {

			$message->to($cmail)->subject('#'.$pid.'//'.$cid.'>>'.$title);
		});



//		flash()->success("you commented.");
		return redirect()->route('post.show', $post->slug);
	}





//	public function sendMail(Request $request) {
		//dd($request->all());

//		$validator = \Validator::make($request->all(), [
//				'name' => 'required|max:255',
//				'email' => 'required|email|max:255',
//				'subject' => 'required',
//				'bodymessage' => 'required']
//		);

//		if ($validator->fails()) {
//			return redirect('contact')->withInput()->withErrors($validator);
//		}




	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$comment = Comment::findOrFail($id);

		return view('partials.comment')
			->with('comment', $comment);
	}

}
