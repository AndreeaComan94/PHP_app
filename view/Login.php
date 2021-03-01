<?php 
$profpic = "../images/loginBackground.jpg";

session_start();
include_once "..\model\User.php";
error_reporting(0)
?>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../css/loginPositioning.css"/>
 
    <title>Autentificare</title>
    
</head>


<style type="text/css">
  body {
        background-image: url('<?php echo $profpic;?>');
  }
</style>


<body>
 
   <nav class="navbar navbar-default">
    <div class="container-fluid">
    
      <div class="navbar-header">
        <a class="navbar-brand" href="#">ManyJobs</a>
      </div>
      
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
         <li class="active"><a href="#">Home</a></li>
         <li><a href="#">Refresh</a></li>
         <li><a href="#">About site</a></li>
        </ul>
      
       <form method="post" action="../controller/LoginController.php"  class="navbar-form form-inline pull-right">
       
     	 <input type="text" name="username" class="form-control" placeholder="Introduceti username" value="<?php 
			  if(isset($_SESSION['typedUserName']))
			      echo $_SESSION['typedUserName']?>"/>
 
         <input type="password" name="password"  class="form-control" placeholder="Introduceti parola" value="<?php 
			  if(isset($_SESSION['typedPassword']))
				  echo $_SESSION['typedPassword']?>"/>
				        
         <input type="submit" class="button" name="login" value="Autentificare companie"> 
	     <input type="submit" class="button" name="login" value="Autentificare utilizator"> 

       </form>
       
     </div>
      
   </div>
  </nav>
  
   
  <div class="imgAlign"> 
   <img src="../images/jobOpennings.png" />
  </div>
 
  <section class="container">
    <section class="login-form">  
    
      <div class="imgBorder">  
        <div class="form-group">  
           <form method="post" action="../controller/LoginController.php" class="form-signin" role="login">
        
             <h1 align="center"><font color=#007AF4> Optiuni</font></h1>
		   
		     <hr>
		    
		     <div class="alignButton"> 
	          <input type="submit" class="button" name="login" value="Creare cont candidat  ">  <br>
	          <input type="submit" class="button" name="login" value="Creare cont companie">
	          <input type="submit" class="button" name="login" value="Recuperare parola      "> 	 
		     </div>
	 
	     </form>   
	   </div>
	</div> 
	
   </section>
  </section> 
  
  
  <div id="footer" class="container">
    <nav class="navbar navbar-default navbar-fixed-bottom">
       <div class="navbar-inner navbar-content-center">
          <p class="text-muted credit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color=#007AF4> ManyJobs.com </font>  web site copyright 2015</p>
       </div>
    </nav>
  </div>
  
</body>
</html>