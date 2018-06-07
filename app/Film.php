<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
	private $_exempleVaribleClass; // exemple de var de class

	public function getNomAttribute($value) { 
		return strtoupper($value);
	}
		
	public function setNomAttribute($val) {
		$this->_exempleVaribleClass; // exemple de var de class, et pas $this->nom (car boucle infinie sinon)
		
		
		$this->attributes['nom'] = ucfirst($val);
	}
	
	public function getDescriptionAttribute() {
		return str_limit($this->nom . ' -'. $this->resume, 140);
	}
	
	
    // Jointure
	public function clients() {
       // Un client est loué par un ou plusieurs clients
       return $this->belongsToMany(Client::class);
   }
   
   public function commentaires() {
	   // Un film possède plusieurs commentaires
	   return $this->hasMany( Commentaire::class ); 
   }
}
