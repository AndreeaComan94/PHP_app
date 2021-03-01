<?php

include_once "ICompanyDao.php";
include_once "Question.php";

class CompanyDaoImplXml implements ICompanyDao {
	
	public function addCompany(Company $company) {
		
		$companyXml = simplexml_load_file("..\Companies.xml");
		$companies = $companyXml->companies;

		$companyElement = $companies->addChild('company');

		$companyElement->addAttribute('id', $this->getNextId($companyXml));
		$companyElement->addAttribute('name', $company->getName());
		$companyElement->addAttribute('description', $company->getDescription());
		$companyElement->addAttribute('address', $company->getAddress());
		$companyElement->addAttribute('telephone', $company->getTelephone());
		$companyElement->addAttribute('email', $company->getEmail());
		$companyElement->addAttribute('logo', $company->getLogo());
		$companyElement->addAttribute('citiesActivities', $company->getCitiesActivities());
		$companyElement->addAttribute('domains', $company->getDomains());
		
		$companyElement->addAttribute('userName', $company->getUserName());
		$companyElement->addAttribute('password', $company->getPassword());
		$companyElement->addAttribute('type', $company->getType());
		$companyElement->addAttribute('question', $company->getQuestion());
		$companyElement->addAttribute('answer', $company->getAnswer());
		  
		$companyXml->asXML("..\Companies.xml");
	}

	
	public function updateCompany(Company $company) {
		
		echo $company->getId();
		$companyXml = simplexml_load_file("..\Companies.xml");
		
		foreach ($companyXml->companies->children() as $xmlCompany) {
			$attr = $xmlCompany->attributes();
			
			 if($attr['id'] == $company->getId()) {
			 	$attr['name'] = $company->getName();
			 	$attr['description'] = $company->getDescription();
			 	$attr['address'] = $company->getAddress();
			 	$attr['telephone'] = $company->getTelephone();
			 	$attr['email'] = $company->getEmail();
			 	$attr['logo'] = $company->getLogo();
			 	$attr['citiesActivities'] = $company->getCitiesActivities();
			 	$attr['domains'] = $company->getDomains();
			 	
				$attr['userName'] = $company->getUserName();
				$attr['password'] = $company->getPassword();
				$attr['type'] = $company->getType();
				$attr['question'] = $company->getQuestion();
				$attr['answer'] = $company->getAnswer();	 
			}
		}

		$companyXml->asXML("..\Companies.xml");
	}
	
	
	public function getCompanyByCompanyNameAndPassword($username, $password) {
		
		$xml = simplexml_load_file("..\Companies.xml");
		
		if(empty($username) || empty($password)) {
			throw new Exception('Please fill the fields for username and password.');
		}
		
		foreach ($xml->companies->children() as $xmlCompany) {
			
			$attr = $xmlCompany->attributes();
			if($attr['userName'] == $username && ($attr['password'] == $password)) {
				
				$company = new Company();
				$company->setId((string)$attr['id']);
				$company->setName((string)$attr['name']);
				$company->setDescription((string)$attr['description']);
				$company->setAddress((string)$attr['address']);
				$company->setTelephone((string)$attr['telephone']);
				$company->setEmail((string)$attr['email']);
				$company->setLogo((string)$attr['logo']);
				$company->setCitiesActivities((string)$attr['citiesActivities']);
				$company->setDomains((string)$attr['domains']);
				
				$company->setUserName((string)$attr['userName']);
				$company->setPassword((string)$attr['password']);
				$company->setType((string)$attr['type']);
				$company->setQuestion((string)$attr['question']);
				$company->setAnswer((string)$attr['answer']);
		  	
				return $company;
			}
		}
		
		throw new Exception("Username or password were incorrect.");
	}
	
	
	public function getCompanyByEmail($email)
	{
	 if(empty($email)) {
		 throw new Exception("Please type an email address.");
	 }
	
	 $xml = simplexml_load_file("..\Companies.xml");
	 
	 foreach ($xml->companies->children() as $xmlCompany) {
	 	
		 $attr = $xmlCompany->attributes();
		 if($attr['email'] == $email) {
		 	
				$company = new Company();
				$company->setId((string)$attr['id']);
				$company->setName((string)$attr['name']);
				$company->setDescription((string)$attr['description']);
				$company->setAddress((string)$attr['address']);
				$company->setTelephone((string)$attr['telephone']);
				$company->setEmail((string)$attr['email']);
				$company->setLogo((string)$attr['logo']);
				$company->setCitiesActivities((string)$attr['citiesActivities']);
				$company->setDomains((string)$attr['domains']);
				
				$company->setUserName((string)$attr['userName']);
				$company->setPassword((string)$attr['password']);
				$company->setType((string)$attr['type']);
				$company->setQuestion((string)$attr['question']);
				$company->setAnswer((string)$attr['answer']);
		  	
				return $company;
		}
	   }
	}

	
	public function getCompanyByCompanyName($userName)
	{ 
	 if(empty($userName)) {
			throw new Exception("Please type an username.");
	 }
	 
	 $xml = simplexml_load_file("..\Companies.xml");
		
	 foreach ($xml->companies->children() as $xmlCompany) {
		
	    $attr = $xmlCompany->attributes();
		if($attr['userName'] == $userName) {
			
			$company = new Company();
				$company->setId((string)$attr['id']);
				$company->setName((string)$attr['name']);
				$company->setDescription((string)$attr['description']);
				$company->setAddress((string)$attr['address']);
				$company->setTelephone((string)$attr['telephone']);
				$company->setEmail((string)$attr['email']);
				$company->setLogo((string)$attr['logo']);
				$company->setCitiesActivities((string)$attr['citiesActivities']);
				$company->setDomains((string)$attr['domains']);
				
				$company->setUserName((string)$attr['userName']);
				$company->setPassword((string)$attr['password']);
				$company->setType((string)$attr['type']);
				$company->setQuestion((string)$attr['question']);
				$company->setAnswer((string)$attr['answer']);
		  	
				return $company;
	    }
	   }
	}
	
	
	private function getNextId($companyXml) {
		
		$nextId = $companyXml->lastId;
			
		$nextId['value'] = $nextId['value'] + 1;
			
		$companyXml->asXML("..\Companies.xml");
			
		return $nextId['value'];
	}
}
?>