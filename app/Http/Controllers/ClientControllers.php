<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\RequestClient;
use App\Services;

class ClientControllers extends Controller
{
  //constructeur pour passer en middleware
	public function __construct() {
//		$clientService = new ClientService();  // Pas tout capté
	 
 		// $this->middleware('auth');
 	}

    public function index(){ 
		$clients = Client::all();
		 
		return view('clients.index', [ 'clients' => $clients]);
	}
	
    public function storeForm(){ 
		$clients = Client::all();
		 
		return view('clients.form', [ 'clients' => $clients]);
	}
	
	
    public function findById( Request $request, $id ){   // recup id en param du ctrl,  les injection viennent avant les param de l'url
		$client = Client::find($id); 
		return   $client;
	}
	
    public function deleteById( Request $request, $id ){   // recup id en param du ctrl,  les injection viennent avant les param de l'url
		$client = Client::find($id); 
		$client->delete(); 
		  
		$clients = Client::all();
		return view('clients.index', [ 'clients' => $clients]);
	}
	 
	
    // public function store(Request $request){ // injection Request (validate sur middleware)
    public function store(RequestClient $request){ // injection Request (validate sur requete)
		$nom = $request->nom;
		$prenom = $request->prenom;
		
		// mapping
		$client = new Client();
		$client->nom = $nom;
		$client->prenom = $prenom;
		$client->save();
		
		$clients = Client::all();
		 return view('clients.index', [ 'clients' => $clients]);
		
		
	
		//	return redirect('login/')->with([
		//	'message' => 'Vous êtes bien inscrit vous pouvez vous logguer'
		//	]);
	}
}
