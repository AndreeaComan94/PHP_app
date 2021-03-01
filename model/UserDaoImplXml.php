<?php

include_once "IUserDao.php";
include_once "Question.php";

class UserDaoImplXml implements IUserDao {
	
	public function addUser(User $user) {
		
		$userXml = simplexml_load_file("..\Users.xml");
		$users = $userXml->users;

		$userElement = $users->addChild('user');

		$userElement->addAttribute('id', $this->getNextId($userXml));
		$userElement->addAttribute('lastName', $user->getLastName());
		$userElement->addAttribute('firstName', $user->getFirstName());
		$userElement->addAttribute('birthdate', $user->getBirthdate());
		$userElement->addAttribute('address', $user->getAddress());
		$userElement->addAttribute('telephone', $user->getTelephone());
		$userElement->addAttribute('email', $user->getEmail());
		
		$userElement->addAttribute('userName', $user->getUserName());
		$userElement->addAttribute('password', $user->getPassword());
		$userElement->addAttribute('type', $user->getType());
		$userElement->addAttribute('question', $user->getQuestion());
		$userElement->addAttribute('answer', $user->getAnswer());
		  
		$userXml->asXML("..\Users.xml");
	}

	
	public function updateUser(User $user) {
		
		echo $user->getId();
		$userXml = simplexml_load_file("..\Users.xml");
		
		foreach ($userXml->users->children() as $xmlUser) {
			$attr = $xmlUser->attributes();
			
			 if($attr['id'] == $user->getId()) {
			 	$attr['lastName'] = $user->getLastName();
			 	$attr['firstName'] = $user->getFirstName();
			 	$attr['birthdate'] = $user->getBirthdate();
			 	$attr['address'] = $user->getAddress();
			 	$attr['telephone'] = $user->getTelephone();
			 	$attr['email'] = $user->getEmail();
			 	
				$attr['userName'] = $user->getUserName();
				$attr['password'] = $user->getPassword();
				$attr['type'] = $user->getType();
				$attr['question'] = $user->getQuestion();
				$attr['answer'] = $user->getAnswer();	 
			}
		}

		$userXml->asXML("..\Users.xml");
	}
	
	
	public function getUserByUserNameAndPassword($username, $password) {
		
		$xml = simplexml_load_file("..\Users.xml");
		
		if(empty($username) || empty($password)) {
			throw new Exception('Please fill the fields for username and password.');
		}
		
		foreach ($xml->users->children() as $xmlUser) {
			
			$attr = $xmlUser->attributes();
			if($attr['userName'] == $username && ($attr['password'] == $password)) {
				
				$user = new User();
				$user->setId((string)$attr['id']);
				$user->setLastName((string)$attr['lastName']);
				$user->setFirstName((string)$attr['firstName']);
				$user->setBirthdate((string)$attr['birthDate']);
				$user->setAddress((string)$attr['address']);
				$user->setTelephone((string)$attr['telephone']);
				$user->setEmail((string)$attr['email']);
				
				$user->setUserName((string)$attr['userName']);
				$user->setPassword((string)$attr['password']);
				$user->setType((string)$attr['type']);
				$user->setQuestion((string)$attr['question']);
				$user->setAnswer((string)$attr['answer']);
		  	
				return $user;
			}
		}
		
		throw new Exception("Username or password were incorrect.");
	}
	
	
	public function getUserByEmail($email)
	{
	 if(empty($email)) {
		 throw new Exception("Please type an email address.");
	 }
	
	 $xml = simplexml_load_file("..\Users.xml");
	 
	 foreach ($xml->users->children() as $xmlUser) {
	 	
		 $attr = $xmlUser->attributes();
		 if($attr['email'] == $email) {
		 	
			 $user = new User();
			 $user->setId((string)$attr['id']);
			 $user->setLastName((string)$attr['lastName']);
			 $user->setFirstName((string)$attr['firstName']);
			 $user->setBirthdate((string)$attr['birthDate']);
			 $user->setAddress((string)$attr['address']);
			 $user->setTelephone((string)$attr['telephone']);
			 $user->setEmail((string)$attr['email']);
			 
			 $user->setUserName((string)$attr['userName']);
			 $user->setPassword((string)$attr['password']);
			 $user->setType((string)$attr['type']);
			 $user->setQuestion((string)$attr['question']);
			 $user->setAnswer((string)$attr['answer']);
	 	 	
			 return $user;
		}
	   }
	}

	
	public function getUserByUserName($userName)
	{ 
	 if(empty($userName)) {
			throw new Exception("Please type an username.");
	 }
	 
	 $xml = simplexml_load_file("..\Users.xml");
		
	 foreach ($xml->users->children() as $xmlUser) {
		
	    $attr = $xmlUser->attributes();
		if($attr['userName'] == $userName) {
			
			$user = new User();
			$user->setId((string)$attr['id']);
			$user->setLastName((string)$attr['lastName']);
			$user->setFirstName((string)$attr['firstName']);
			$user->setBirthdate((string)$attr['birthDate']);
			$user->setAddress((string)$attr['address']);
			$user->setTelephone((string)$attr['telephone']);
			$user->setEmail((string)$attr['email']);
			
			$user->setUserName((string)$attr['userName']);
			$user->setPassword((string)$attr['password']);
			$user->setType((string)$attr['type']);
			$user->setQuestion((string)$attr['question']);
			$user->setAnswer((string)$attr['answer']);
			 
			return $user;
	    }
	   }
	}
	
	
	private function getNextId($userXml) {
		
		$nextId = $userXml->lastId;
			
		$nextId['value'] = $nextId['value'] + 1;
			
		$userXml->asXML("..\Users.xml");
			
		return $nextId['value'];
	}
}
?>