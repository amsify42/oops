<?php
/*
trait-abstract.php
*/

abstract class Person {

	public function greet() {
		echo 'Good day, good sir!';
	}

    abstract function eat($food);
}


trait EatingTrait {

    public function eat($food){
        $this->putInMouth($food);
    }

    private function putInMouth($food){
        echo 'Eat '.$food;
    }

}





class NicePerson extends Person {

    use EatingTrait;

    public function greet(){
        echo 'Good day, good sir!';
    }

}


$person = new NicePerson;
$person->eat('Egg');