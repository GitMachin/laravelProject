<?php
namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\InputType;

class SpecialType extends InputType {
	
	public function getTemplate() {
		return 'fields.special';
	}
	
	public function getDefaults() {
		return [
			'rules' => 'numeric',
			'default_value' => '0',
			'attr' => [
				'placeholder' => '__.__'
			]
		];
	}
	
}