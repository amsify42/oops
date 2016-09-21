<?php


// Whenever object is created and used,  destrcutor will get executed after all calls have been made using object

class Demo {

	public $name 	= 'Sami';
	public $age 	= 21;

	public function getName() {
		echo $this->name;
	}

	public function getAge() {
		echo $this->age;
	}

	function __destruct() {
		echo 'Executed';
	}

}


$demo = new Demo();
$demo->getName();
$demo->getAge();