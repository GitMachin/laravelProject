<?php

namespace App\Forms;

//use Kris\LaravelFormBuilder\Form;

class PostForm extends Form
{
	protected $resource = 'posts';
	
    public function buildForm()
    {
		parent::buildForm( );
		
        $this
			->add($name ='name', $type='special', [
				'label' => 'Titre',
				'rules' => 'required|min:5'
			]  )
			->add($name ='description', $type='textarea', [
				'label' => 'Contenu',
				'rules' => 'required|min:5'
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
