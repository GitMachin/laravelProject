<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Forms\PostForm;
use Illuminate\Http\Request;
use \Kris\LaravelFormBuilder\FormBuilder;
use App\Forms;
use App\Post;
use Yajra\Datatables\Datatables;

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
		$form->getModel()->save();
//		return redirect()->route('posts.index');
		return redirect()->route('posts');
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
//		return redirect()->route('posts.index');
		return redirect()->route('posts');
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
	
	/**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View
	 */
	public function getList() {
		return view('posts.list');
	}

	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function dtAjax() {
		
 	$queryPost = Post::select( 'posts.*' );
	
					Carbon::setLocale('fr');
		 
        return Datatables::of($queryPost)
            ->addColumn('action', function ($queryPost) {
                return '<a href="posts/'.$queryPost->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
				
            ->editColumn('created_at', function ($queryPost) {
                return $queryPost->created_at ? with(new Carbon($queryPost->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($queryPost) {
                return $queryPost->updated_at ? with(new Carbon($queryPost->updated_at))->format('d/m/Y') : '';;
            })
			
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
			
            ->make(true);
	}

}
