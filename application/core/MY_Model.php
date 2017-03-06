<?php
class MY_Model extends CI_Model{

	public function array_push_assoc($array, $key, $value){
	$array[$key] = $value;
	return $array;
	}
}

?>





