<?php

namespace App\Http\Controllers;

use App\Forms\PostForm;
use Illuminate\Http\Request;
use \Kris\LaravelFormBuilder\FormBuilder;
use App\Forms;
use App\Post;

class PostsController extends Controller {

	private $formBuilder;

	public function __construct(FormBuilder $formBuilder) {
		$this->formBuilder = $formBuilder;
	}

	/**
	 *
	 * @param FormBuilder $formBuilder
	 * @return type
	 */
	public function index() {
		
	}

	public function show($id) {
		
	}

	public function edit( Post $post) { 
		$form = $this->getForm(  $post ); 
		return view($name = 'posts.edit', compact("form"));
	}

	public function update( Post $post) {  
		$form = $this->getForm( $post );
		$form->redirectIfNotValid(); 
		$form->save();
		return redirect()->route('posts.index');
	}


	public function destroy($id) {
		
	}

	/**
	 *
	 * @param FormBuilder $formBuilder
	 * @return type
	 */
	public function create() {
		$form = $this->getForm(  ); 
		return view($name = 'posts.create', compact("form"));
	}

	/**
	 *
	 * @param FormBuilder $formBuilder
	 */
	public function store() {
		$form = $this->getForm();
		$form->redirectIfNotValid();
 
// 		dd( $post->toArray() );
//		dd($form->getFieldValues());
//		dd($form->getModel());

//		$post = new Post();
//		$post->setAttribute($key, $post);

		$form->getModel()->save();
		return redirect()->route('posts.index');
	}

	/**
	 *
	 * @param Post $post
	 * @return type
	 */
	private function getForm(Post $post = null) {
		$post = $post ?: new Post();

		return $this->formBuilder->create($formClass = Forms\PostForm::class, [
//			'method' => "POST",
//			'route' => 'posts.store',
				'model'	 => $post,
				'data'	 => [
					'admin' => false
				]
		]);
	}

}
