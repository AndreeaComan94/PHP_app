<?php
	session_start();
	error_reporting(0)
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../css/loginPositioning.css"/>
	
	<title>Inregistrare cu succes</title>
</head>

<body>
  <section class="container">
    <section class="login-form">
      <div class="form-group">
         
		 <div class="error">
		   <?php echo $_SESSION["err"]; ?>
		 </div>
		
	     <h3 align="center"><font color="#0051CA">Confirmare!</font></h3>
		 <div align="center" class="form-group">Utilizatorul/Compania a fost adaugat(a) cu succes!</div>
		 <div align="center" class="form-group">Acum va puteti autentifica.</div>
		
         <br>
			
		<div align="center">
		   <input type="submit" value="Autentificare" class="button" name="btnLoginConfirm">
	    </div>
 
     </div>
	</section>
   </section>

</body>
</html>