<?php

namespace CodeProject\Validators;

use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
	
	protected $rules = [
		'owner_id' => 'required',
		'client_id' => 'required',
		'name' => 'required|max:255',
		'description' => 'required|max:255',
		'progress' => 'required',
		'status' => 'required'
	];

	protected $messages = [
	    'required' => 'Informe do nome corretamente!'
	];

}