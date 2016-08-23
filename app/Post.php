<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends BaseModel
{
		use SoftDeletes;
		protected $table = 'posts';
		public static $rules = [
				'title' => 'required|max:100|string',
				'content' => 'required|string',
				'url' => 'required|active_url'
		];

		public function user()
		{
			return $this->belongsTo(User::class, 'created_by', 'id');
		}
		public function setTitleAttribute($value)
		{
			return htmlspecialchars(strip_tags($value));
		}
		public function setContentAttribute($value)
		{
			return htmlspecialchars(strip_tags($value));
		}
		public function getTitleAttribute($value)
		{
			return ucwords($value);
		}
		public static function voteCount($userId, $count)
		{
			//code
		}
		public static function count($userId)
    {
        return Post::where('created_by', $userId)->count();
    }
		

}
