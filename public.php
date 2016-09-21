<?php

// Public is accessible from everywhere after creating object

class Panzer {

	public $name = 'Panzer';

	public function getName() {
		return $this->name;
	}

}

$panzer = new Panzer;
echo $panzer->name;
echo $panzer->getName();