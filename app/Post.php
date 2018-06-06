<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    protected $table = "posts";
		
	public $timestamps = true;
	public $guarded = [];

	public function users(){
		return $this->belongsTo( User::class );
	}
//public function posts() {
//  return $this->hasMany('posts');
//}
//	public function created() {
//		return view($name = 'posts.create');
//	}
}
