<?php

namespace App\Forms;

class Form extends \Kris\LaravelFormBuilder\Form {

	protected $resource = '';
	
public function  buildForm()
    {
	
		if( $this->getModel() && $this->getModel()->id){
			$method = "PUT";
			$url = route($name = $this->resource . ".update", $this->getModel()->id );
		} else {
			$method = "POST";
			$url = route($name = $this->resource . ".store");
		}
		
		$this->formOptions = [		
			'method' => $method,
			'url' => $url
		];
		
		parent::buildForm( );
}

	public function redirectIfNotValid($destination = null) {
		// On retire les trucs chelou, telque les Files,...
		$values = $this->getFieldValues();
		
		$values	 = array_filter($values, function($value) {
			return !is_null($value) && (!is_object($value) || !$value instanceof UploadedFile);
		});

		foreach ($values AS $name => $value) {
			$this->getModel()->$name = $value;
		}

		parent::redirectIfNotValid($destination);
	}

}
