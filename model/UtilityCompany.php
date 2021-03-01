<?php

class UtilityCompany {
	 
	
// 	public static function checkEmptyFields(Company $companyToCheck) {
// 		UtilityCompany::checkEmptyField($companyToCheck->getName());
// 		UtilityCompany::checkEmptyField($companyToCheck->getDescription());
// 		UtilityCompany::checkEmptyField($companyToCheck->getAddress());
// 		UtilityCompany::checkEmptyField($companyToCheck->getTelephone());
// 		UtilityCompany::checkEmptyField($companyToCheck->getEmail());
// 		UtilityCompany::checkEmptyField($companyToCheck->getLogo());
// 		UtilityCompany::checkEmptyField($companyToCheck->getCitiesActivities());
// 		UtilityCompany::checkEmptyField($companyToCheck->getDomains());
		
// 		UtilityCompany::checkEmptyField($companyToCheck->getUserName());
// 		UtilityCompany::checkEmptyField($companyToCheck->getPassword());
// 		UtilityCompany::checkEmptyField($companyToCheck->getConfirmedPassword());
// 		UtilityCompany::checkEmptyField($companyToCheck->getAnswer());
// 	}


	public static function checkUniqueUserName(Company $companyToCheck) {	
		//check if the userName is repeating
		if(CompanyDaoSingleton::getCompanyDaoXmlInstance()->getCompanyByCompanyNameAndPassword($companyToCheck->getUserName())) {
			throw new Exception('Username is not available.');
		}
	}

	
	public static function checkCorrectPassword(Company $companyToCheck) {		
		//check if passwords was typed correctly twice
		if($companyToCheck->getPassword() != $companyToCheck->getConfirmedPassword()) {
			throw new Exception('Please confirm your password correctly.');
		}


		if(strlen($companyToCheck->getPassword()) < 6)	{
			throw new Exception('Please give a password of at least 6 characters.');
		}
	}


	public static function checkValidEmail(Company $companyToCheck) {
		$emailPattern = '/^\S+@\S+\.\S+$/';
		$emailInput = $companyToCheck->getEmail();

		if(preg_match($emailPattern, $emailInput) == 0) {
			throw new Exception('Please insert a valid email adress');
		}
	}

	
	public static function checkUniqueEmail(Company $companyToCheck) {	
		if(CompanyDaoSingleton::getCompanyDaoXmlInstance()->getUserByEmail($companyToCheck->getEmail())) {
			throw new Exception('An account already exists for this email. Please use another email address.');
		}
	}

	
// 	public static function checkEmptyField($field) {
// 		if(empty($field)) {
// 			echo $field;
// 			throw new Exception('Please fill all fields.');
// 		}
// 	}
}

?>