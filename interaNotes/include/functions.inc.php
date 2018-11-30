<?php
	function getEnglishDate($date){
		$membres = explode('/', $date);
		$date = $membres[2].'-'.$membres[1].'-'.$membres[0];
		return $date;
	}

	function createProtectedPassword($pwd){
    	$protectedPassword = sha1(sha1($pwd).SALT);

		return $protectedPassword;
	}

	function createRandomPassword(){
		return substr(str_shuffle(strtolower(sha1(rand() . time() . SALT))),0, PASSWORD_LENGTH);
	}

?>
