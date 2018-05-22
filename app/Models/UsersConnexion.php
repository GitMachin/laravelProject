<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 07:37:04 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UsersConnexion
 * 
 * @property int $id
 * @property \Carbon\Carbon $date_connexion
 * @property int $user_id
 *
 * @package App\Models
 */
class UsersConnexion extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'date_connexion'
	];

	protected $fillable = [
		'date_connexion',
		'user_id'
	];
}
