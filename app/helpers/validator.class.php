<?php
class Validator{

	public function validatePassword($value){
		if(preg_match('/^(?=.*\d)(?=.*[\x{0021}-\x{002b}\x{003c}-\x{0040}])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/', $value)){
			return true;
		}else{
			return false;
		}
	}

	public function validateForm($fields){
		foreach($fields as $index => $value){
			$value = strip_tags(trim($value));
			$value = trim($value);
			$fields[$index] = $value;
		}
		return $fields;
	}

	public function validateId($value){
		if(filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1))){
			return true;
		}else{
			return false;
		}
	}

	public function validateEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}

	public function validateAlphabetic($value, $minimum, $maximum){
		if(preg_match("/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{".$minimum.",".$maximum."}$/", $value)){
			return true;
		}else{
			return false;
		}
	}

	public function validateAlphanumeric($value, $minimum, $maximum){
		if(preg_match("/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\-\,\s\.]{".$minimum.",".$maximum."}$/", $value)){
			return true;
		}else{
			return false;
		}
	}
	public function validateNumeric($value, $minimum, $maximum){
		if(preg_match("/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{".$minimum.",".$maximum."}$/", $value)){
			return false;
		}else{
			return true;
		}
	}

}
?>
