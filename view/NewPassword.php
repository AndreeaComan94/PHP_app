<?php
session_start ();
error_reporting ( 0 )?>
<html>
 <head>

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="../css/newPasswordPositioning.css"/>
  
  <title>Parola noua</title>
  
 </head>

<body>
	<section class="container">
	  <section class="password-form">
		<div class="form-group">
		  
		  <form method="post" action="../controller/NewPassword.php" role="changePassword">
					
			 <div class="error">
				 <?php echo $_SESSION["err"]; ?>
				 <?php echo $_GET["errorMessage"]; ?>
			 </div>
				
			 <h1 align="center">Change your password</h1>
				
				
			 <div class="form-group">
			  <label>*Parola noua:</label> <input type="text" name="newPassword" class="form-control">
			 </div>


			 <div class="form-group">
			  <label>*Rescrie</label> <input type="text" name="retype" class="form-control" >
			 </div>


			 <input type="hidden" name="userName" value="<?php echo $_GET["userName"]?>"> <br>
			 
			 <div class="alignButton">
			  <input class="button" type="submit" value="Ok" name="newPassword">
			  <input class="button" type="reset" value="Cancel" name="newPassword">
			 </div>

		   </form>
		 
		 </div>
	   </section>
	</section>

</body>
</html>