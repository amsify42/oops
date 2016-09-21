<?php

//Interface is a collection of abstract methods without body--

interface Inter {

	function getInterName();
	function getInterDate();
}


//Any class implementing itnerface must provide body for all methods of interface

class Test implements Inter {

	function getInterName() {
		echo 'provided body for interface method getInterName() <br />';
	}

	function getInterDate() {
		echo 'provided body for interface method getInterDate() <br />';
	}

}


$test = new Test;
$test->getInterName();
$test->getInterDate();


// Abstract class is collection of methods with body or without body

Abstract class Abs {

	abstract  function getAbsName();

	function getAbsDate() {

	}		

	
}


// Any class extending abstract class must provide body for all the abstract methods presebt in the class

class Test2 extends Abs {

	function getAbsName() {
		echo 'provided body for abstract class method getAbsName() <br />';
	}

}


$test2 = new Test2;
$test2->getAbsName();