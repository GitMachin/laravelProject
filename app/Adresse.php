<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
	
	// recup client
	// Magic si on utilise les conventions de nommage
	public function client() { 
		// Une adresse appartient à un 
		return $this->belongsTo( Client::class ); // Inner join
	}
}
