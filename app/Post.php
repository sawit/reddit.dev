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
 	public static function searchContentTitleOwner($searchQuery)
 	{
 		return static::join('users', 'users.id', '=', 'posts.created_by')->where('posts.content', 'LIKE', "%{$searchQuery}%")->orWhere('posts.title', 'LIKE', "%{$searchQuery}%")->orWhere('users.name', 'LIKE', "%{$searchQuery}%")->select('*', 'posts.id as id')->take(5)->get();
	}
	public function createdBy($user) {
		return (!is_null($user)) ?  $this->created_by == $user->id : false;
	}

	public function votes() {
		return $this->hasMany(Vote::class);
	}
	public function upvotes() {
		return $this->votes()->where('vote', '=', 1);
	}
	public function downvotes() {
		return $this->votes()->where('vote', '=', 0);
	}
	public function voteScore() {
		$upvotes = $this->upvotes()->count();
		$downvotes = $this->downvotes()->count();
		return $upvotes - $downvotes;
	}

	public function userVote($user) {
			$this->votes()->where('user_id', '=', $user->id)->first();
	}

}
