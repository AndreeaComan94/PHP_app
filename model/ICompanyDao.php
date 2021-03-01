<?php

include_once "Company.php";

interface ICompanyDao {
	public function addCompany(Company $company);
	public function updateCompany(Company $company);
}
?>