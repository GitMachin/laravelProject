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
			//->add($name ='name', $type='special', [
			->add($name ='name', $type='text', [
				'label' => 'Titre',
				'rules' => 'required|min:5'
			]  )
			->add($name ='description', $type='textarea', [
				'label' => 'Contenu',
				'rules' => 'required|min:5'
			]  )
			->add( $name = 'created_by', $type = 'entity', [
				'label' => 'Auteur',
				// 'multiple' => false,
				'class' => \App\User::class,
				'property' => 'name'
			]);
		
		if( $this->getData( $name = "admin" ) === true ){
			$this
				->add($name='created_at', $type='date');
		}
		
		$this->add($name ='submit', $type='submit' , [
			'label' => "Envoyer"
		]);
    }
}
