<?php

interface Person {

    public function greet();
    public function eat($food);
}

interface Person2 {

    public function eat2($food);
}


trait EatingTrait {

    public function eat($food){
        $this->putInMouth($food);
    }

    public function eat2($food){
        $this->putInMouth($food);
    }

    private function putInMouth($food){
        echo 'Eat '.$food.'<br/>';
    }
}

// We can use Trait if we don't want to provide body for the interface methods in current class, instead we can use the trait and provide body for the methods of interface methods.
class NicePerson implements Person, Person2 {

    use EatingTrait;

    public function greet(){
        echo 'Good day, good sir!';
    }
    
}


$person = new NicePerson;
$person->eat('Egg');
$person->eat('Chicken');



// class MeanPerson implements Person{

//     use EatingTrait;

//     public function greet(){
//         echo 'Your mother was a hamster!';
//     }
// }