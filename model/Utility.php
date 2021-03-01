<?php

class Utility {
	 
	
	public static function checkEmptyFields(User $userToCheck) {
		Utility::checkEmptyField($userToCheck->getLastName());
		Utility::checkEmptyField($userToCheck->getFirstName());
		Utility::checkEmptyField($userToCheck->getBirthdate());
		Utility::checkEmptyField($userToCheck->getAddress());
		Utility::checkEmptyField($userToCheck->getTelephone());
		Utility::checkEmptyField($userToCheck->getEmail());
		
		Utility::checkEmptyField($userToCheck->getUserName());
		Utility::checkEmptyField($userToCheck->getPassword());
		Utility::checkEmptyField($userToCheck->getConfirmedPassword());
		Utility::checkEmptyField($userToCheck->getAnswer());
	}


	public static function checkUniqueUserName(User $userToCheck) {	
		//check if the userName is repeating
		if(UserDaoSingleton::getUserDaoXmlInstance()->getUserByUserName($userToCheck->getUserName())) {
			throw new Exception('Username is not available.');
		}
	}

	
	public static function checkCorrectPassword(User $userToCheck) {		
		//check if passwords was typed correctly twice
		if($userToCheck->getPassword() != $userToCheck->getConfirmedPassword()) {
			throw new Exception('Please confirm your password correctly.');
		}


		if(strlen($userToCheck->getPassword()) < 6)	{
			throw new Exception('Please give a password of at least 6 characters.');
		}
	}


	public static function checkValidEmail(User $userToCheck) {
		$emailPattern = '/^\S+@\S+\.\S+$/';
		$emailInput = $userToCheck->getEmail();

		if(preg_match($emailPattern, $emailInput) == 0) {
			throw new Exception('Please insert a valid email adress');
		}
	}

	
	public static function checkUniqueEmail(User $userToCheck) {	
		if(UserDaoSingleton::getUserDaoXmlInstance()->getUserByEmail($userToCheck->getEmail())) {
			throw new Exception('An account already exists for this email. Please use another email address.');
		}
	}

	
	public static function checkEmptyField($field) {
		if(empty($field)) {
			echo $field;
			throw new Exception('Please fill all fields.');
		}
	}
}

?>