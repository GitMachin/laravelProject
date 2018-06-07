<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //
	public function film() { 
		// Un commentaire appartient à un film
		return $this->belongsTo( Film::class ); 
	}
}
