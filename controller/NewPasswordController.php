<?php
include_once '..\model\Utility.php';
include_once '..\model\UtilityCompany.php';
include_once '..\model\UserDaoSingleton.php';
include_once '..\model\CompanyDaoSingleton.php';
session_start();

switch($_POST['newPassword']) {
	
	case 'Ok':
		  ok();
		  break;
		  
	case 'Cancel':
		  cancel();
		  break;
}


function ok() {
	
	try {
		 $user = new User();
		 $user = UserDaoSingleton::getUserDaoXmlInstance()->getUserByUserName($_POST['userName']);
			
		 $user->setPassword($_POST['password']);
		 $user->setConfirmedPassword($_POST['confirmedPassword']);
			
		 Utility::checkEmptyField($user);
		 Utility::checkCorrectPassword($user);
			
		 UserDaoSingleton::getUserDaoXmlInstance()->updateUser($user);
		 header("Location: ../view/ConfirmAccount.php");
		 
	}catch(Exception $ex)
	{
	 header('Location: ../view/NewPassword.php?errorMessage='.$ex->getMessage()."&userName=".$_POST['userName']);
	}
}


function cancel() {
	unsetUserToCheck();
	header('Location: ..\view\Login.php');
}