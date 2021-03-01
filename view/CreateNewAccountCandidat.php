<?php
 
session_start();
error_reporting(0);
include_once "..\Model\User.php";
include_once "..\Model\Utility.php";
include_once "..\Model\UserDaoSingleton.php";

?>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../css/createNewAccount.css"/>
	
	<title>Creare cont nou</title>
	
</head>
 
<body >

  <section class="container">
    <section class="login-form">
      <div class="form-group">
        
	   <form method="post" action="../controller/CreateNewAccountCandidatController.php" class="form-signin" role="login">
	   
		    <div class="error" >
		     <?php echo $_SESSION["err"]; ?>
		     <?php echo $_GET["errorMessage"]; ?>
		    </div>
		 
			<h3>Creare cont</h3>
	
				<div><label>*Nume:</label></div>
				<input type='text' class='textBox' name='lastName' size='50'>
		 
		        <div><label>*Prenume:</label></div>
				<input type='text' class='textBox' name='firstName' size='50'>
				
				<div><label>*Data nasterii:</label></div>
				<input type='text' class='textBox' name='birthdate' size='50'>
				
				<div><label>*Adresa:</label></div>
				<input type='text' class='textBox' name='address' size='50'>
				
				<div><label>*Telefon:</label></div>
				<input type='text' class='textBox' name='telephone' size='50'>
				
				<div><label>*Email:</label></div>
				<input type='text' class='textBox' name='email' size='50'>
				
			    <hr> 
			    
				<label>*User Name:</label>
				<input type='text' class='textBox' name='userName' size='50'>
	  
				<label>*Password:</label>
				<input type='password' class='textBox' name='password' size='50'>
		  
				<label>*Confirm password:</label>
				<input type='password' class='textBox' name='confirmedPassword' size='50'>
			   
			    <hr> 
			    
				<label>*Intrebare:</label>
				<select class="textBox" name="question">
					<option value="oneQ">Cum se numeste animalul de comapanie?</option>
					<option value="twoQ">Care este numele bunicii din partea mamei?</option>
					<option value="threeQ">Unde ti-ai petrescut ultima vacanta?</option>
				</select>
		 
				<div><label>*Raspuns:</label></div>
				<input type='text' class='textBox' name='answer' size='50'>
		  
				<div class="alignButton">
				  <input class='button' type='submit' value='Back' name='signUp'>
				  <input class='button' type='submit' value='Next' name='signUp'> 
			    </div>
			     
			</form>
			
		 </div>
		<br>
    
	</section>
  </section>
  
</body>
</html>
