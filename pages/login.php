<?php 
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Connexion</title>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../style/style.css">

    <!-- ---- Script ---- -->
    <script src="/js/jquery-3.6.0.min.js"></script>
	<script src="/js/index.js"></script>
	<script src="/js/validationform.js"></script>
	
	<!-- ---- Fonts ---- -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>

<header class="siteHeader">
	<h1> 
		Vanestarre
	</h1>
</header>

<body>
		<!-- ---- Formulaire de Connexion ---- -->
		<div class id="loginForm">
			<form class="boiteAValider" action="../config/login-action.php" method="post">
			<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
					else if(isset($_SESSION['suid']))
					 {
						header('Location: ../index.php');
					 }
                ?>  
				<div class="form-block">
				
						<strong><Label for="login" class="labelID">Identifiant </Label></strong>
							<input type="email" placeholder="Email" name="login" required> </br>
							
						<strong><Label for="mdp" class="labelPass">Mot de passe </Label></strong>
							<input type="password" placeholder="Mot de passe"name="mdp" required> </br>
						
					<div id="Validation-Form">
						<input type="submit" id="loginButton" name="action" value="Connexion">
						<button id="signLink"><a href="sign.php">Inscription</a></button>
					</div>
				</div> 
			</form>
			<?php
    unset($_SESSION["error"]);
?>
		</div>
		
		

