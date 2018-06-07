<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestClient extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;  // passser a true pour pouvoir l'utiliser
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'nom'	 => 'required|max:10',
			'prenom' => 'required',
			/*
			  'nom'=> 'required|max:255',
			  'mail'=> 'required|email|max:255|unique:client', // a noter, unique client (verifie l'unicité en bd)
			  'password'=> 'required|min:8',
			  'sexe'=> 'required|in:f,m',
			 */
		];
	}

}
