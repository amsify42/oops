<?php


// Whenever object is created constructor get executed
// constructor is a method with zero argument by default

class Demo {

	public $name 	= 'Sami';
	public $age 	= 21;

	function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
	}

	public function getName() {
		echo $this->name;
	}

	public function getAge() {
		echo $this->age;
	}

}


$demo = new Demo('Fasi', 42);
$demo->getName();
$demo->getAge();