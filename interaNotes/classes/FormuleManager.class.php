<?php
class FormuleManager{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function multiplier($n1, $n2){
		return $n1 * $n2;
	}

	public function additioner($n1,$n2){
		return $n1 + $n2;
	}

	public function diviser ($n1,$n2){
		return $n1 / $n2;
	}

	public function soustraire ($n1,$n2) {
		return $n1 - $n2;
	}

	
}
