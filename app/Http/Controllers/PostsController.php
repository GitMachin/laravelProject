<?php

namespace App\Http\Controllers;

use  App\Forms;
use Illuminate\Http\Request;
use \Kris\LaravelFormBuilder\FormBuilder;

class PostsController extends Controller
{
 //
	public function create( FormBuilder $formBuilder) {
		$form = $formBuilder->create( $formClass = Forms\PostForm::class, [
			'data' => [
				'admin' => true
			]
		] );
		
		return view($name = 'posts.create', compact( "form" ));
	}
}
