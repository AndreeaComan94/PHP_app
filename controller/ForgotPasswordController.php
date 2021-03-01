<?php

session_start();

include_once "..\model\UserDaoSingleton.php";
include_once "..\model\CompanyDaoSingleton.php";

$_SESSION['typedEmail'] = $_POST['email'];
 
switch ($_POST['forgotPassword']) 
{
	
	case 'Get question':
		  getQuestion();
		  break;
		  
	case 'Ok':
		  ok();
		  break;
		  
	case 'Back':
		  back();
		  break;
}


function getQuestion() {
	
	try {
		$user = UserDaoSingleton::getUserDaoXmlInstance()->getUserByEmail($_POST['email']);
		$company = CompanyDaoSingleton::getCompanyDaoXmlInstance()->getCompanyByEmail($_POST['email']);
		
		header('Location: ../view/ForgotPassword.php?question='.$user->getQuestion());
		header('Location: ../view/ForgotPassword.php?question='.$company->getQuestion());
	    } 
	    
	    catch(Exception $ex)
	    {
		 header('Location: ../view/ForgotPassword.php?errorMessage='.$ex->getMessage());
	    }
}


function ok() {
	
	try {
		if(isset($_SESSION['userToCheck'])) {
			
			$user = unserialize($_SESSION['userToCheck']);	
			$userName = UserDaoSingleton::getUserDaoXmlInstance()->getUserByEmail(($_POST['email']))->getUserName();
				
			if($_POST['answer'] == $user->getAnswer()) {
				header('Location: ../view/NewPassword.php?userName=' . $userName);
			
			}else {
			    throw new Exception("Incorrect answer");
			}
		}
		
	}catch(Exception $ex)
	{
	 header('Location: ../view/ForgotPassword.php?errorMessage='.$ex->getMessage());
	}
}


function back() {
	
	 unsetCurrentUser();
	 header("Location: ../view/Login.php");
}


function unsetCurrentUser() {
	
	if(isset($_SESSION['userToCheck'])) {
	   unset($_SESSION['userToCheck']);
	}
	
	if(isset($_SESSION['typedEmail'])) {
	   unset($_SESSION['typedEmail']);
	}
}
?>