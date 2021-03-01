<?php

include_once "UserDaoImplXml.php";

class UserDaoSingleton {
	private static $userDaoXmlObject;
	private function __construct(){}
	
	public static function getUserDaoXmlInstance() {
		
		if(empty($userDaoXmlObject)) {
		   $userDaoXmlObject = new UserDaoImplXml();			
		}
		
	 return $userDaoXmlObject;
	}
}

?>
