<?php
	session_start();
	error_reporting(0)
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../css/loginPositioning.css"/>
	
	<title>Modificare efectuata cu succes</title>
</head>

<body>

  <section class="container">
    <section class="login-form">
      <div class="form-group">
        
	   <form method="post" action="../controller/CompanyModifiedWithSuccess.php" class="form-login" role="login">
	   
		 <div class="error">
		   <?php echo $_SESSION["err"]; ?>
		 </div>
		
	     <h3 align="center"><font color="#0051CA">Confirmare!</font></h3>
		 <div align="center" class="form-group">Compania a fost modificata cu succes!</div>
		 <div align="center" class="form-group">Acum puteti continua.</div>
		
         <br>
			
		<div align="center">
		   <input type="submit" value="Continuare" class="button" name="btnCompanyView">
	    </div>
	    
	  </form>
	
     </div>
	</section>
   </section>

</body>
</html>