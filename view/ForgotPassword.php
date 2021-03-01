<?php
include_once "..\model\User.php";
include_once "..\model\Question.php";


error_reporting( 0 );
$userToCheck = new User ();

if (isset ( $_SESSION ['userToCheck'] )) {
	$userToCheck = unserialize ( $_SESSION ['userToCheck'] );
}
?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../css/forgotPasswordPositioning.css" />

<title>Recuperare parola</title>
</head>

<body>

	<section class="container">
		<section class="forgot-form">
			<div class="form-group">
				<form method="post" action="../controller/ForgotPasswordController.php"
					class="form-login" role="forgotPass">


					<h1 align="center">Recuperare parola</h1>

					<!-- Email and field -->
					<div class="form-group">
						<label>*Email:</label> <input type="text" name="email"
							class="form-control" placeholder="Email"
							value="<?php
							if (isset ( $_SESSION ['typedEmail'] ))
								echo $_SESSION ['typedEmail']?>" />
					</div>

						<!-- Select a question -->
					<div class="form-group">*Selectati o intrebare</div>
					<input class="button" type="submit" value="Intrebari"
					class="form-control"
						id="getQuestion" name="forgotPassword" />
			

			<div class="form-group">
				<label>*Intrebare</label> 
				<input type="text" name="question"
					class="form-control" placeholder="Alegeti intrebarea"
					value="<?php echo $_GET ['question']?>" />
			</div>

					<!-- Write answer -->
			<div class="form-group">
				<label>*Raspuns</label> <input type="text" name="answer"
					class="form-control" placeholder="Raspuns"
					value="<?php
					echo $_SESSION ['answer']?>" />
			</div>


			<div class="alignButton">
				<input class="button" type="submit" value="Back"
					name="forgotPassword" /> <input class="button" type="submit"
					value="Ok" name="forgotPassword" />
			</div>
			
		</form>
			
		</div>
    
	</section>
  </section>
  
</body>
</html>