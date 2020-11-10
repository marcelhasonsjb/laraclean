<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Post;
use Auth;

class SavePostRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// edit form: check if user is owner of this post
		/*if ( request()->method() == 'PUT' || request()->method() == 'PATCH' )
		{
			return Auth::user()->posts->find( request()->segment(2) );
		}*/

		return Auth::check();
	}


	/**
	 * Do this, if forbidden
	 */
	public function forbiddenResponse()
	{
		abort(403, "You can't!");
	}


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'title'  => 'required|max:200',
			'text'   => 'required',
			'tags'   => 'array',
			'stats'   => 'array',
//			'mail_date' => 'timestamp'
		];

		$count = count((array)$this->input('items')) - 1;

		foreach(range(0, $count) as $index) {
			$rules["items.$index"] = 'mimes:txt,TXT,pdf,PDF,xls,XLS,xlsx,XLSX,csv,CSV,doc,DOC,docx,DOCX,png,PNG,jpg,JPG,jpeg,JPEG,gif,GIF,zip,ZIP,svg,SVG';
		}

		return $rules;
	}


	/**
	 * Custom validation messages
	 *
	 * @return array
	 */
	public function messages()
	{
		$messages = [];

//		foreach( $this->file('items') as $key => $val ) {
//			$messages["items.$key.mimes"] = "All files must be of type: :values";
//		}

		return $messages;
	}

}
