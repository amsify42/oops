<?php

// static variable or method can be accessed without creating object

class Panzer {

	static $name = 'Panzer';

	static function getName() {
		echo 'Entered Static Method';
	}

}

echo Panzer::$name;
echo Panzer::getName();