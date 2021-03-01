<?php
include_once "..\model\UserDaoSingleton.php";
include_once "..\model\CompanyDaoSingleton.php";
session_start();
 
$_SESSION['typedUserName'] = $_POST['username'];
$_SESSION['typedPassword'] = $_POST['password'];


switch ($_POST['login']) {
	
	case 'Autentificare utilizator':
		  logIn($_POST['username'], $_POST['password']);
		  break;
		  
    case 'Autentificare companie':
		  	logIn2($_POST['username'], $_POST['password']);
		  	break;
	case 'Creare cont candidat  ':
		  signUp();
		  break;
	
    case 'Creare cont companie':
		  signUpCompany();
		  break;
		  	
	case "Recuperare parola      ":
		  forgotPassword();
		  break;
}


function logIn($username, $password) {
	
    try{
    	
		$user = new User();	
	   
	    
	    $user = UserDaoSingleton::getUserDaoXmlInstance()->getUserByUserNameAndPassword($username, $password);
	 
		 
		 
		
		eraseTypedUserNameAndPassword();
		
		switch ($user->getType()) {
		
			case 'Candidat':
		
				header("Location: ../view/ClientView.php");
				break;
		
		}
		 	 
		
	 
				  
	  }catch(Exception $ex) {
		  header("Location: ../view/Login.php?errorMessage=". $ex->getMessage());
	  }
}
 
function logIn2($username, $password) {
	$company = new Company();
	$company = CompanyDaoSingleton::getCompanyDaoXmlInstance()->getCompanyByCompanyNameAndPassword($username, $password);
	$_SESSION['currentCompany'] = serialize($company);
	eraseTypedUserNameAndPassword();
	switch ($company->getType()) {
	
		case 'Company':
	
			header("Location: ../view/CompanyView.php");
			break;
				
	}
	
	
	
}
function eraseTypedUserNameAndPassword() {
	
	if(isset($_SESSION['typedUserName'])) {
	   unset($_SESSION['typedUserName']);
	}
	
	if(isset($_SESSION['typedPassword'])) {
	   unset($_SESSION['typedPassword']);
	}
}


function signUp() {	
	
	eraseTypedUserNameAndPassword();
	header("Location: ../view/CreateNewAccountCandidat.php");
}

function signUpCompany() {

 
	header("Location: ../view/CreateNewAccountCompany.php");
}

function forgotPassword() {
	
	eraseTypedUserNameAndPassword();
	header("Location: ../view/ForgotPassword.php");
}
?>