<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
		$form->getModel()->save();
		return redirect()->route('users');
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
		return redirect()->route('users');
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
		$queryUser = User::leftJoin('users_connexions AS connexions', 'users.id', '=', 'connexions.user_id')
			->select('users.*', 'connexions.date_connexion AS date_co');
		
					Carbon::setLocale('fr');
		 
        return Datatables::of($queryUser)
            ->addColumn('action', function ($queryUser) {
                return '<a href="users/'.$queryUser->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
           ->editColumn('id', 'ID: {{$id}}')
				
            ->editColumn('created_at', function ($queryUser) {
                return $queryUser->created_at ? with(new Carbon($queryUser->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('updated_at', function ($queryUser) {
                return $queryUser->updated_at ? with(new Carbon($queryUser->updated_at))->format('d/m/Y') : '';;
            })
            ->editColumn('date_co', function ($queryUser) {
                return $queryUser->date_co ? with(new Carbon($queryUser->date_co))->diffForHumans() : '';;
            })
            ->filterColumn('created_at', function ($queryUser, $keyword) {
                $queryUser->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($queryUser, $keyword) {
                $queryUser->whereRaw("DATE_FORMAT(updated_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('date_co', function ($queryUser, $keyword) {
                $queryUser->whereRaw("DATE_FORMAT(date_co,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->make(true);
	}

}
