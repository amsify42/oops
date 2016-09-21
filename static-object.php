<?php
/* 
static-object.php
*/
class MyClass {

	function __construct() {
		echo '<br/><span style="color:green; font-weight:bold;">Entered Constructor</span><br/><br/>';
	}

	public function func1() {
		echo 'Entered Func 1<br/>';
		return MyClass::findContext();
	}

	public function func2() {
		echo 'Entered Func 2<br/>';
		return MyClass::findContext();
	}

	public function func3() {
		echo 'Entered Func 3<br/>';
		return MyClass::findContext();
	}


	public function findContext() {

		if(isset($this) && get_class($this) == __CLASS__ ) {
            echo "Called Non-Statically<br/>";
            return $this;
        } else {
        	echo "Called Statically<br/>";
            return new MyClass;
        }

	}

	function __destruct() {
		echo '<br/><span style="color:red; font-weight:bold;">Entered Destructor</span><br/><br/>';
	}

}



class Model extends MyClass {


}


Model::func1()->func2()->func3();