<?php


class MyClass {

	function __construct() {
		$this->sayHi = create_function( '', 'print "hi";');
	}

	 function __call($method, $args) {

	   if(property_exists($this, $method)) {
           	if(is_callable($this->$method)) {
               return call_user_func_array($this->$method, $args);
           }
       }

	 }

	 function __set($name, $value){
        $this->{$name} = $value;
     }

     function __get($name){
        return $this->{$name};
     }

}


$obj 		      = new MyClass;
$obj->id 	    = 1;
$obj->name 	  = 'Sami';
$obj->setEmail('some@mail.com');



echo $obj->name.'<br/>';
echo $obj->sayHi().'<br/>';






class MyClass2 {


  function __call($method, $args) {

     if(property_exists($this, $method)) {
            if(is_callable($this->$method)) {
               return call_user_func_array($this->$method, $args);
           }
       } else {

          if(substr($method, 0, 3) === 'set') {

              $explodeMethod = explode('set', $method);

                if(trim($explodeMethod[1]) != '') {

                    $property = lcfirst($explodeMethod[1]);

                    $this->{$property} = $args[0];          

                }
            }
        }
   }

   function __set($name, $value){
        $this->{$name} = $value;
     }

     function __get($name){
        return $this->{$name};
     }

}


$obj2          = new MyClass2;
$obj2->name    = 'Fasi';
$obj2->setEmail('some@mail.com');
$obj2->setCreditCardNumber('123465684');

var_dump($obj2);