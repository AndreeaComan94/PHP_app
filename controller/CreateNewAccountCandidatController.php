<?php
session_start();

include_once "..\model\User.php";
include_once "..\model\Question.php";
include_once "..\model\Utility.php";
include_once "..\model\UserDaoSingleton.php";

$currentUser = new User();
$currentUser->setLastName($_POST['lastName']);
$currentUser->setFirstName($_POST['firstName']);
$currentUser->setBirthdate($_POST['birthdate']);
$currentUser->setAddress($_POST['address']);
$currentUser->setTelephone($_POST['telephone']);
$currentUser->setEmail($_POST['email']);

$currentUser->setUserName($_POST['userName']);
$currentUser->setPassword($_POST['password']);
$currentUser->setConfirmedPassword($_POST['confirmedPassword']);
$currentUser->setType('Candidat');
$currentUser->setQuestion($_POST['question']);
$currentUser->setAnswer($_POST['answer']);
 
  
switch ($_POST['signUp']) {
	
	case 'Next':
		  nextStep($currentUser);
		  break;
		  
	case 'Back':
		  back();
		  break;
}


function nextStep($user)
{
	try {
		//put the user in session first because in case fields are not valid 
		//data must be reloaded in the form
		$_SESSION['currentUser'] = serialize($user);	
		
		Utility::checkEmptyFields($user);
		Utility::checkUniqueUserName($user);
		Utility::checkCorrectPassword($user);
		Utility::checkValidEmail($user);
		Utility::checkUniqueEmail($user);

		UserDaoSingleton::getUserDaoXmlInstance()->addUser($user);
		
	    header('Location: ../view/ConfirmAccount.php');
	    
	  } catch (Exception $ex)
	  {
	    header('Location: ../view/CreateNewAccountCandidat.php?errorMessage='.$ex->getMessage());
	  }
}


function back() {
	
	if(isset($_SESSION['currentUser'])) {
	   unset($_SESSION['currentUser']);
	}
	
	header('Location: ../view/Login.php');
}

?>