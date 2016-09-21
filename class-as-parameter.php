<?php

class Request {

	protected $rules  = array();
	protected $errors = array();

	function __construct() {
		$this->rules = $this->rules();
	}

	public function get($var) {

		if(isset($_REQUEST[$var]))
		return $_REQUEST[$var];
	}


	public function validate() {

		foreach($this->rules as $key => $rule) {

			if($this->get($key) == '') {
				$this->errors[] = $key.' is required';
			}

		}

		return $this->errors;
	}


}


class FormRequest extends Request {

	public function rules() {
		return [
			'page' 	=> 'required',
			'index' => 'required'
		];
	}

}



class Controller {

	public function index(FormRequest $request) {

		$page = $request->get('page');

		echo 'Controller Index'.$page;
	}

}




// $obj = new Controller;
// $obj->index(new FormRequest);


// $reflector = new ReflectionMethod("Controller", "index");

// foreach ($reflector->getParameters() as $param) {
//     // param name
//     echo 'Name: '.$param->name.'<br/>';

//     // param type hint (or null, if not specified).
//     if(isset($param->getClass()->name)) {
//     	echo 'Type: '.$param->getClass()->name.'<br/>';
//     }

//     // finds out if the param is required or optional
//     echo 'Optional: '.$param->isOptional().'<br/><br/>';
// }


$controller = 'Controller'; 
$method 	= 'index';

$reflector = new ReflectionMethod($controller, $method);

foreach($reflector->getParameters() as $param) {

    if(isset($param->getClass()->name)) {

    	$requestClass 	= $param->getClass()->name;
    	$request 		= new $requestClass;
    	$response 		= $request->validate();

    	if(sizeof($response) > 0) {
    		var_dump($response);
    	} else {
    		$obj = new $controller;
    		$obj->$method(new $requestClass);
    	}

    }

}