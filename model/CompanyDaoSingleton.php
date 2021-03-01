<?php

include_once "CompanyDaoImplXml.php";

class CompanyDaoSingleton {
	private static $companyDaoXmlObject;
	private function __construct(){}
	
	public static function getCompanyDaoXmlInstance() {
		
		if(empty($companyDaoXmlObject)) {
		   $companyDaoXmlObject = new CompanyDaoImplXml();			
		}
		
	 return $companyDaoXmlObject;
	}
}

?>
