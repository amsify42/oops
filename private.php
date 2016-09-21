<?php


// private is accessible only within same class after creating object

class Panzer {

	private $name = 'Panzer';

	public function getName() {
		return $this->getFullName();
	}

	private function getFullName() {
		return $this->name;
	}

}

$panzer = new Panzer;
echo $panzer->getName();
//echo $panzer->getFullName();



class CTS extends Panzer {

	public function getPanzerName() {
		return $this->name;
	}
}



$cts = new CTS;
// error
echo $cts->getPanzerName();
