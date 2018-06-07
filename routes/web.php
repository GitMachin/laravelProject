<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

		use App\Client;
/**
 * POSTS
 */
Route::resource($name		 = 'posts', $controller	 = 'PostsController');
Route::get('posts', 'PostsController@getList')->name('posts');
Route::get('posts.data', 'PostsController@dtAjax')->name('posts.data');

/**
 * USERS
 * @todo rename UserController -> UsersController
 */
Route::resource($name		 = 'users', $controller	 = 'UserController');
Route::get('users', 'UserController@getList')->name('users');
Route::get('users.data', 'UserController@dtAjax')->name('users.data');

/**
 * OTHERS ROUTES..
 */
Route::get('/', function () {
	return view('welcome');
});

Route::get('exemples/{exemple_id}', function ( $exemple_id) {
	return 'exemple de page : ' . $exemple_id;
});

/**
Route::get('addition/{a}/{b?}', function ( $a, $b = 0 ) {  // addition(a, b)
	$r = response('resultats : '  . $a ."+". $b . "=" . ($a+$b), 200);
	$r = $r
			->header('Content-Type', 'text/plain')
			->header('Pragma', 'no-cache');
	
	return $r;
});

Route::get('addition/{a}/{b?}', function ( $a, $b = 0 ) {  // addition(a, b)
	$r = response('<html><body>resultats : '  . $a ."+". $b . "=" . ($a+$b) . "</body></html>", 200);
	$r = $r
			->header('Pragma', 'no-cache');
	
	return $r;
});
 */


Route::get('/accueil', function (  ) {
	return redirect('/');
});

Route::get('addition/{a}/{b?}', function ( $a, $b = 0 ) {  // addition(a, b) 
	$data = [
		'asset' => [
			'a' => $a,
			'b' => $b,
		], 
		'result' => ($a + $b)
	];
	
	$r = response(  ); 
	
	return $r->json($data);
});


Route::get('/phpinfo', function () {
	return view('phpinfo');
});

Route::get('/forms', function () {
	return view('forms');
});

Route::get('/carbons', function () {
	return view('carbons');
});

Route::get('/datatables', function () {
	return view('datatables');
});
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Group 
 */

Route::group(['prefix' => 'clients'],function(){
	Route::get('list/{a}', function ($a ) {
		
		$viewData = [
			'id' => $a,
			'html' => "<b>GRAS</b>",
		'nom' => 'dlp',
		'prenom' => 'orel'	
		];
		
 $client1= new Client() ;
 $client1->prenom = 'Adrien' ;
 $client1->nom = 'Vossough' ;
$client2 = new Client()  ;
 $client2->prenom = 'Aurélien' ;
$client2->nom = 'de la Porte des Vaux';



$client1->save();
$client2->save();


	   return view('clients.list', $viewData);
	});

	Route::get('register', function () {
	   return view('clients.register');
	});
});





