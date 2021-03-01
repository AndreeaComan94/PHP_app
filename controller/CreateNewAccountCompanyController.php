<?php
session_start();

include_once "..\model\Company.php";
include_once "..\model\Question.php";
include_once "..\model\UtilityCompany.php";
include_once "..\model\CompanyDaoSingleton.php";

$currentCompany = new Company();
$currentCompany->setName($_POST['name']);
$currentCompany->setDescription($_POST['description']);
$currentCompany->setAddress($_POST['address']);
$currentCompany->setTelephone($_POST['telephone']);
$currentCompany->setEmail($_POST['email']);
$currentCompany->setLogo($_POST['logo']);
$currentCompany->setCitiesActivities($_POST['citiesActivities']);
$currentCompany->setDomains($_POST['domains']);

$currentCompany->setUserName($_POST['userName']);
$currentCompany->setPassword($_POST['password']);
$currentCompany->setConfirmedPassword($_POST['confirmedPassword']);
$currentCompany->setType('Company');
$currentCompany->setQuestion($_POST['question']);
$currentCompany->setAnswer($_POST['answer']);
 
  
switch ($_POST['signUp']) {
	
	case 'Next':
		  nextStep($currentCompany);
		  break;
		  
	case 'Back':
		  back();
		  break;
}


function nextStep($company)
{
	try {
		//put the user in session first because in case fields are not valid 
		//data must be reloaded in the form
		$_SESSION['$currentCompany'] = serialize($company);	
 	 
// 		UtilityCompany::checkEmptyFields($company); 
// 		UtilityCompany::checkUniqueUserName($company);
// 		UtilityCompany::checkCorrectPassword($company);
// 		UtilityCompany::checkValidEmail($company);
// 		UtilityCompany::checkUniqueEmail($company);
 
		CompanyDaoSingleton::getCompanyDaoXmlInstance()->addCompany($company);
		
	    header('Location: ../view/ConfirmAccount.php');
	    
	  } catch (Exception $ex)
	  {
	    header('Location: ../view/CreateNewAccountCompany.php?errorMessage='.$ex->getMessage());
	  }
}


function back() {
	
	if(isset($_SESSION['currentCompany'])) {
	   unset($_SESSION['currentCompany']);
	}
	
	header('Location: ../view/Login.php');
}

?>