<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\UsersConnexion;
use App\User;
use App\Forms;
use Yajra\Datatables\Datatables;
use \Kris\LaravelFormBuilder\FormBuilder;

class UserController extends Controller {

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

	public function edit( User $user) { 
		$form = $this->getForm(  $user ); 
		return view($name = 'users.edit', compact("form"));
	}

	public function update(User $user) {  
		$form = $this->getForm( $user );
		$form->redirectIfNotValid(); 
		$form->save();
		return redirect()->route('users.index');
	}

	public function destroy($id) {
		
	}
	
	/**
	 *
	 * @param FormBuilder $formBuilder
	 * @return type
	 */
	public function create(FormBuilder $formBuilder) {
		$form = $this->getForm();

		return view($name = 'users.create', compact("form"));
	}

	private function getForm(User $user = null) {
		$user = $user ?: new User();

		return $this->formBuilder->create($formClass = Forms\UserForm::class, [
				'model'	 => $user,
				'data' => [
					'admin' => false
				]
			]);
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
		return redirect()->route('users.index');
	}
	
	/**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View
	 */
	public function getList() {
		return view('users.list');
	}

	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function dtAjax() {
		$query = User::leftJoin('users_connexions AS connexions', 'users.id', '=', 'connexions.user_id')
			->select('users.*', 'connexions.date_connexion AS date_co');
		return Datatables::of($query)->make(true);
	}

}
