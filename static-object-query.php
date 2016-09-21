<?php
/* 
static-object-query.php
*/

class QueryBuilder {

	static 		$comparisons = array('=', '>', '<');

	private 	$query;

	function __construct() {
		if(!isset($this->table)) {
			$this->table = strtolower(get_called_class());
		}
	}

	public function select($columnString) {
		$selectClause = 'SELECT '.$columnString;
		return QueryBuilder::findContext($selectClause, get_called_class());
	}

	public function find($value = NULL) {

		$calledClass 		= get_called_class(); 
		$calledClassObject 	= new $calledClass;

		$table 				= strtolower($calledClass);

		if(isset($calledClassObject->table)) {
				$table		= $calledClassObject->table;
		}

		$whereClause = 'SELECT * FROM '.$table.' WHERE id = '.QueryBuilder::createValue($value);

		return QueryBuilder::findContext($whereClause, get_called_class());
	}


	public function where($column, $operator = '=', $value = NULL) {

		$whereClause		= '';

		if(isset($this) && strpos($this->query, 'WHERE') !== false) {
			$whereClause 	= ' AND';	
		}

		if(in_array($operator, QueryBuilder::$comparisons)) {
			$whereClause .= ' WHERE '.$column.' '.$operator.' '.QueryBuilder::createValue($value);
		} else {
			$whereClause .= ' WHERE '.$column.' = '.QueryBuilder::createValue($operator);
		}

		return QueryBuilder::findContext($whereClause, get_called_class());
	}


	public function orWhere($column, $operator = '=', $value = NULL) {

		if(in_array($operator, QueryBuilder::$comparisons)) {
			$whereClause = ' OR WHERE '.$column.' '.$operator.' '.QueryBuilder::createValue($value);
		} else {
			$whereClause = ' OR WHERE '.$column.' = '.QueryBuilder::createValue($operator);
		}

		return QueryBuilder::findContext($whereClause, get_called_class());
	}


	public function findContext($clauseToUpdate = '', $calledClass) {

		if(isset($this) && is_a($this, $calledClass)) {
			$this->query .= $clauseToUpdate;
	        return $this;
	    } else {
	        $queryBuilderObject 		= new $calledClass;
	        $queryBuilderObject->query 	= $clauseToUpdate.' FROM '.$queryBuilderObject->table;
	        return $queryBuilderObject;
	    }

	}

	public static function createValue($value) {

		if(is_int($value) || is_float($value)) {
			return $value;
		} else {
			return '"'.$value.'"';
		}

	}

	function __destruct() {

		if(isset($this->query)) {
			var_dump($this->query);
		}

	}

}


class DatabaseTable extends QueryBuilder {


}


class User extends DatabaseTable {

	protected $table = 'users';

}


User::select('id, name')->where('id', 1)->where('name', 'fasi')->orWhere('name', 'sami');
//User::find(1);