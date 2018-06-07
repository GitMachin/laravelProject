<?php

namespace App\Http\Middleware;

use Closure;

class MonFiltre {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		/**
		 * Exemple de validate (attention pas en global)
		$nom = $request->nom;

		// Verification que c'est une chaine alpha
		$formDatas = [
				'nom'	 => 'required|max:10',
				'prenom' => 'required',
			  
			  // 'nom'=> 'required|max:255',
			  // 'mail'=> 'required|email|max:255|unique:client', // a noter, unique client (verifie l'unicité en bd)
			  // 'password'=> 'required|min:8',
			  // 'sexe'=> 'required|in:f,m',
			 
		];

		$request->validate($formDatas); 
		 */
		
		// Switch de langue en fct de l'url en fct de l'url
		// App::setLocale( Request::segment(1) );
		// Cf sous domaine
		
		  app()->setLocale('fr');
		 
		return $next($request);
	}

}
