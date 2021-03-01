<?php
	class Company {
		
		private $id;
		private $name;
		private $description;
        private $address;
		private $telephone;
		private $email;
		private $logo;
		private $citiesActivities;
		private $domains;
		
		private $userName;
		private $password;
		private $confirmedPassword;
		private $type;
		private $question;
		private $answer;
		 
		
		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function setName($name) {
			$this->name = $name;
		}
		
		public function getDescription() {
			return $this->description;
		}
		
		public function setDescription($description) {
			$this->description = $description;
		}
	  
		public function getAddress() {
			return $this->address;
		}
		
		public function setAddress($address) {
			$this->address = $address;
		}
		 
		public function getTelephone() {
			return $this->telephone;
		}
		
		public function setTelephone($telephone) {
			$this->telephone = $telephone;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function setEmail($email) {
			$this->email = $email;
		}
		
		public function getLogo() {
			return $this->logo;
		}
		
		public function setLogo($logo) {
			$this->logo = $logo;
		}
		
		public function getCitiesActivities() {
			return $this->citiesActivities;
		}
		
		public function setCitiesActivities($citiesActivities) {
			$this->citiesActivities = $citiesActivities;
		}
		
		public function getDomains() {
			return $this->domains;
		}
		
		public function setDomains($domains) {
			$this->domains = $domains;
		}
		
		
		
		
		public function getUserName() {
			return $this->userName;
		}
		
		public function setUserName($userName) {
			$this->userName = $userName;
		}
		
		public function getPassword() {
			return $this->password;
		}
		
		public function setPassword($password) {
			$this->password = $password;
		}
		
		public function getConfirmedPassword() {
			return $this->confirmedPassword;
		}
		
		public function setConfirmedPassword($confirmedPassword) {
			$this->confirmedPassword = $confirmedPassword;
		}
			
		public function getType() {
			return $this->type;
		}
		
		public function setType($type) {
			$this->type = $type;
		}
		
		public function getQuestion() {
			return $this->question;
		}
		
		public function setQuestion($question) {
			$this->question = $question;
		}
		
		public function getAnswer() {
			return $this->answer;
		}
		
		public function setAnswer($answer) {
			$this->answer = $answer;
		}
		 
	}
?>