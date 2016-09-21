<?php


// Protected can only be used in same class or extended class after creating object

class Panzer {

	protected $name = 'Panzer';

	public function getName() {
		return $this->name;
	}

}

$panzer = new Panzer;
echo $panzer->getName();



class CTS extends Panzer {

	public function getPanzerName() {
		return $this->name;
	}
}



$cts = new CTS;
echo $cts->getName();
echo $cts->getPanzerName();
