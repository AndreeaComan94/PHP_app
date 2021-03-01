<?php

session_start();

include_once "..\model\Company.php";
include_once "..\model\Question.php";
include_once "..\model\UtilityCompany.php";
include_once "..\model\CompanyDaoSingleton.php";

if(isset($_SESSION['currentCompany'])) {
   $currentCompany = unserialize($_SESSION['currentCompany']);
   
} else {
   $currentCompany = new Company();
}

?>

<html>
 <head>
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
   <link rel="stylesheet" type="text/css" href="../css/editCompanyAccount.css"/>
   
   <title>Edit company account</title>
 </head>
 
 <body>
 
   <nav class="navbar navbar-default">
    <div class="container-fluid">
    
      <div class="navbar-header">
        <a class="navbar-brand" href="#">ManyJobs</a>
      </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
         <li class="active"><a href="CompanyView.php">Home</a></li>
         <li><a href="EditAccountCompany.php">Edit account</a></li>
         <li><a href="#">Post job</a></li>
        </ul>
      
        <ul class="nav navbar-nav navbar-right">
         <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
        </ul>    
      </div>
      
   </div>
  </nav>
 
  
  <form method="post" action="../controller/editAccountCompanyController.php" class="form-signin" role="login">
	
	 <hr> 
	 
	 <h3><font color=#007AF4>Editare cont</font></h3>  
	 
	 <div class="col-md-5 col-sm-4 col-xs-6">
	 
	    <div><label>Nume companie:</label></div>
	    <input type='text' class='textBox' name='name' size='50' value="<?php echo $currentCompany->getName()?>">
		 
	    <div><label>Descriere:</label></div>
	    <input type='text' class='textBox' name='description' size='50' value="<?php echo $currentCompany->getDescription()?>">
			 
	    <div><label>Adresa:</label></div>
	    <input type='text' class='textBox' name='address' size='50' value="<?php echo $currentCompany->getAddress()?>">
				
	    <div><label>Telefon:</label></div>
	    <input type='text' class='textBox' name='telephone' size='50' value="<?php echo $currentCompany->getTelephone()?>">
				
	    <div><label>Email:</label></div>
	    <input type='text' class='textBox' name='email' size='50' value="<?php echo $currentCompany->getEmail()?>">
				
	    <div><label>Logo:</label></div>
	    <input type='text' class='textBox' name='logo' size='50' value="<?php echo $currentCompany->getLogo()?>">
				
	    <div><label>Orase activitate:</label></div>
	    <input type='text' class='textBox' name='citiesActivities' size='50' value="<?php echo $currentCompany->getCitiesActivities()?>">
				
	    <div><label>Domenii:</label></div>
	    <input type='text' class='textBox' name='domains' size='50' value="<?php echo $currentCompany->getDomains()?>">

	 </div>
	     
	 <br>
	 <br>
	 <br>
		 
     <div class="col-md-4 col-sm-4 col-xs-6">	 
          
	    <div><label>User Name:</label></div>
	    <input type='text' class='textBox' name='userName' size='50' value="<?php echo $currentCompany->getUserName()?>">
	  
	    <div><label>Password:</label></div>
	    <input type='password' class='textBox' name='password' size='50' value="<?php echo $currentCompany->getPassword()?>">
		  
	    <div><label>Confirm password:</label></div>
	    <input type='password' class='textBox' name='confirmedPassword' size='50' value="<?php echo $currentCompany->getConfirmedPassword()?>">
	    
	       <div><label>Intrebare:</label></div>
	    <select class="textBox" name="question">
			 <option value="oneQ">Cum se numeste animalul de comapanie?</option>
			 <option value="twoQ">Care este numele bunicii din partea mamei?</option>
			 <option value="threeQ">Unde ti-ai petrescut ultima vacanta?</option>
	    </select>
		 
	    <div><label>Raspuns:</label></div>
	    <input type='text' class='textBox' name='answer' size='50' value="<?php echo $currentCompany->getQuestion()?>">
		  
	    <div class="alignButton"  >
		 
			 <input  class='button'  type='submit' value='Save changes'  name="editProfile"> 
	    </div>
	    
	    </div>
     
 </form>


   <div id="footer" class="container">
     <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="navbar-inner navbar-content-center">
           <p class="text-muted credit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color=#007AF4> ManyJobs.com </font>  web site copyright 2015</p>
        </div>
    </nav>
   </div>
</body>
</html>
