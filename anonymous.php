<?php


// $func = function() {
// 	echo 'Hello';
// };


// $func();



class ParentClass {

	public function hello() {
		echo 'Hello<br/>';
	}

}




class Route {

	function __construct($func) {
		$this->$func = $func;
	}

	public static function get($route , $method) {

		//echo $route.' Route<br/>';

		if(gettype($method) == 'object') {

			$method();

		} else if(gettype($method) == 'string') {

		$methodArray = explode('@', $method);	

			if(sizeof($methodArray) > 1) {
				
			$object = new $methodArray[0];
			$object->$methodArray[1]();

			}

			else if(sizeof($methodArray) == 1) {
				$method();				
			}

		}

	}

} 


$id = 1;

Route::get('admin/users', function() use ($id){
		echo 'Entered Anonymous Function'.$id.'<br/>';
});

Route::get('admin/users', 'ParentClass@hello');