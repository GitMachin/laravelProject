<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $fillable = ['nom', 'prenom']; // ce qu'on a le droit de modifier

	/**
	 * protected $hidden = ['created_at', 'updated_at']; // ce qu'on affiche pas
	 */

	// recup adresse
	// Magic si on utilise les conventions de nommage
	public function adresse() {
		// Une client possède une adresse
		return $this->hasOne(Adresse::class);  //  si on respecte pas faut indiquer en 2em param
	}

	// Jointure
	public function films() {
		// Un film est loué par un ou plusieurs clients
		return $this->belongsToMany(Film::class);
	}

}
