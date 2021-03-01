<?php
session_start();
 
include_once "..\model\Question.php";
include_once "..\model\UtilityCompany.php";
include_once "..\model\CompanyDaoSingleton.php";

$currentCompany = unserialize($_SESSION['currentCompany']);
 
$modifiedCompany = new Company();
$modifiedCompany->setId($currentCompany->getId());
$modifiedCompany->setName($_POST['name']);
$modifiedCompany->setDescription($_POST['description']);
$modifiedCompany->setAddress($_POST['address']);
$modifiedCompany->setTelephone($_POST['telephone']);
$modifiedCompany->setEmail($_POST['email']);
$modifiedCompany->setLogo($_POST['logo']);
$modifiedCompany->setCitiesActivities($_POST['citiesActivities']);
$modifiedCompany->setDomains($_POST['domains']);

$modifiedCompany->setUserName($_POST['userName']);
$modifiedCompany->setPassword($_POST['password']);
$modifiedCompany->setConfirmedPassword($_POST['confirmedPassword']);
$modifiedCompany->setType('Company');
$modifiedCompany->setQuestion($_POST['question']);
$modifiedCompany->setAnswer($_POST['answer']);


 
switch($_POST['editProfile'])
{
	case 'Save changes':
		saveChanges($modifiedCompany);
		break;
	case 'Back':
		back();
		break;
}

function saveChanges(Company $modifiedCompany)
{
	try
	{
		CompanyDaoSingleton::getCompanyDaoXmlInstance()->updateCompany($modifiedCompany);
		$_SESSION['modifiedCompany'] = serialize($modifiedCompany);
		switch ($modifiedCompany->getType())
		{
			case 'Company':
				header("Location: ../view/CompanyModifiedWithSuccess.php");
				break;
			 
		}				
	}
	catch(Exception $ex)
	{
		header('Location: ../view/EditProfile.php?errorMessage='.$ex->getMessage());
	}
}

function Back()
{
	header('Location: ../view/Login.php');
}
?>