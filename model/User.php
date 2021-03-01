<?php
	class User {
		
		private $id;
		private $lastName;
		private $firstName;
		private $birthdate;
		private $address;
		private $telephone;
		private $email;
		 
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
		
		public function getLastName() {
			return $this->lastName;
		}
		
		public function setLastName($lastName) {
			$this->lastName = $lastName;
		}
		
		public function getFirstName() {
			return $this->firstName;
		}
		
		public function setFirstName($firstName) {
			$this->firstName = $firstName;
		}
		
		public function getBirthdate() {
			return $this->birthdate;
		}
		
		public function setBirthdate($birthdate) {
			$this->birthdate = $birthdate;
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