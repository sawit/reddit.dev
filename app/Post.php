<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends BaseModel
{
		use SoftDeletes;
		protected $table = 'posts';
		protected $softDeletes = true;
 		protected $dates = ['created_at', 'updated_at'];

		public static $rules = [
				'title' => 'required|max:100|string',
				'content' => 'required|string',
				'url' => 'required|active_url'
		];
	protected function formatValidationErrors(Validator $validator)
 	{
 		return $validator->errors()->all();
 	}
 	public function setContentAttribute($value)
 	{
 		$this->attributes['content'] = strip_tags($value);
 	}
 	public function setTitleAttribute($value)
 	{
 		$this->attributes['title'] = strip_tags($value);
 	}
 	public function setUrlAttribute($value)
 	{
 		$this->attributes['url'] = strip_tags($value);
 	}
 	public function user()
 	{
 		return $this->belongsTo(User::class, 'created_by');
 	}
 	public static function sortPosts($pageSize)
 	{
 		return Post::orderBy('created_at', 'desc')->paginate($pageSize);
 	}
 	public static function searchPosts($search)
 	{
 		return Post::where('content', 'LIKE', '%' . $search . '%')->with('user')->paginate(10);
	}

		// public function user()
		// {
		// 	return $this->belongsTo(User::class, 'created_by', 'id');
		// }
		// public static function count($userId)
    // {
    //     return Post::where('created_by', $userId)->count();
    // }
		// public static function search($name) {
		// 	return self::join('users', 'posts.created_by', '=', 'users.id')->where('users.name', '=', $name);
		// }
}
