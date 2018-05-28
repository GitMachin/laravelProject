<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PostForm extends Form
{
    public function buildForm()
    {
        $this
			->add($name ='name', $type='text' )
			->add($name ='description', $type='textarea' );
		
		if( $this->getData( $name = "admin" ) === true ){
			$this
				->add($name='created_at', $type='date');
		}
		
		$this->add($name ='submit', $type='submit' , [
			'label' => "Envoyer"
		]);
    }
}
