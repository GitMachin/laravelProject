<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form 
{
	protected $resource = 'users';
	
	public function buildForm()
    {
		parent::buildForm( );
		
        $this
			->add($name ='name', $type='text', [
				'label' => 'Nom',
				'rules' => 'required|min:5'
			] )
			->add($name ='email', $type='email', [
				'label' => 'Mail',
				'rules' => 'required|email'
			]  );
		
		if( $this->getData( $name = "admin" ) === true ){
			$this
				->add($name='created_at', $type='date');
		}
		
		$this->add($name ='submit', $type='submit' , [
			'label' => "Envoyer"
		]);
    }
}
