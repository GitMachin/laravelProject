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
use App\Commentaire;
use App\Adresse;
use App\Film;

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
Route::get('/accueil', function ( ) {
	return redirect('/');
});

Route::get('addition/{a}/{b?}', function ( $a, $b = 0 ) {  // addition(a, b)
	$data = [
		'asset'	 => [
			'a'	 => $a,
			'b'	 => $b,
		],
		'result' => ($a + $b)
	];

	$r = response();

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


/**
 * Auth
 */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**
 * si on a fait un --- ressource
 */
Route::resource($name		 = 'films', $controller	 = 'FilmController')
	->middleware('auth'); // On protege pas login
	
/**
 * 
 // Authentification
$this->get(
'login',
'Auth\LoginController@showLoginForm'
)->name('login');

$this->post(
'login',
'Auth\LoginController@login'
);

$this->post(
'logout',
'Auth\LoginController@logout'
)->name('logout'); 
 */	



/**
 * Group Clients..
 */
Route::group(['prefix' => 'clients', 'middleware' => "auth" ], function() {  // middleware sur un groupe
	/**
	 * Route de test
	 */
	Route::get('list/{a}', function ($a ) {
		/**
		// Utilisation des propriétés
		$film = new Film(); 
		$film->nom = 'Blade runner';
	    echo $film->nom  ;
	 	echo  $film->description   ; 
		 */
		 
		/**
		 * les méthodes save et saveManypour sauver un et plusieurs commentaires
		  $film		 = Film::first();
		  $com1		 = new Commentaire ();
		  $com1->texte = 'Bof';
		  $film->commentaires()->save($com1);

		  $com2		 = new Commentaire ();
		  $com2->texte = 'Mouai';

		  $com3		 = new Commentaire ();
		  $com3->texte = 'Bof Bof';

		  $film->commentaires()->saveMany([$com2, $com3]);
		 */
		
		/**
		 *
		// Accéder aux commentaires d'un film:
		$film				 = Film::where('titre', 'star wars')->first();
		$commentaires_film	 = $film->commentaires;

		// Accéder au film d'un commentaire:
		$commentaire = Commentaire::first();
		$film		 = $commentaire->film;

		// La méthode commentaires() retourne un querybuilder:
		$commentaires_film = $film->commentaires()->where('texte', 'LIKE', 'Bonjour%')->get();
		 */

		/**
		 * Les acces save, sur des table pivots
		  // Accéder à l'adresse d'un client :
		  $client = Client::where('nom', 'Vossough')->first();
		  $adresse_client = $client->adresse;

		  // Accéder au client d'une adresse :
		  $adresse = Adresse::first();
		  $client= $adresse->client;


		  // Insérer une relation en base de données
		  $client = new Client();
		  $client->nom = 'Vossough '.$a;
		  $client->prenom = 'p '.$a;
		  $client->save();


		  $adresse = new Adresse;
		  $adresse->code_postal= '59800';
		  $adresse->voie= 'voie 3 ';
		  $client->adresse()->save($adresse);

		  // Mettre à jour une relation
		  $client = Client::find(1);
		  $adresse = new Adresse();
		  $adresse->code_postal= '59000';
		  $adresse->voie= 'voie 4 ';
		  $client->adresse()->save($adresse);
		 */
		/**
		 * Cree des gars
		  $client1		 = new Client();
		  $client1->prenom = 'Adrien';
		  $client1->nom	 = 'Vossough';
		  $client1->save();

		  $client2		 = new Client();
		  $client2->prenom = 'Aurélien';
		  $client2->nom	 = 'de la Porte des Vaux';
		  $client2->save();
		 */
		$viewData = [
			'id'	 => $a,
			'html'	 => "<b>GRAS</b>",
			'nom'	 => 'dlp',
			'prenom' => 'orel'
		];

		return view('clients.list', $viewData);
	});

	Route::get('register', function () {
		return view('clients.register');
	});
	


	/**
	 * CRUD
	 */
	Route::get('/', 'ClientControllers@index');
	Route::get('create', 'ClientControllers@storeForm'); // Affiche le form
	// Route::post('create', 'ClientControllers@store')->middleware('validate'); // Enregistre le form avec middleware
	Route::post('create', 'ClientControllers@store'); // Enregistre le form avec validate en requete
	Route::delete('{id}', 'ClientControllers@deleteById'); // delete client

	Route::get('{id}', 'ClientControllers@findById'); // find specifique client
});





