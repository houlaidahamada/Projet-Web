<?php 
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Connexion</title>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


    <!-- ---- Script ---- -->
    <script src="/js/jquery-3.6.0.min.js"></script>
	<script src="/js/index.js"></script>
	<script src="/js/validationform.js"></script>
	<script src="/js/showPass.js"></script>
	
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
		<div id="loginForm">
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
					 else if(isset($_SESSION["success"]))
					 {
						 $success = $_SESSION["success"];
						 echo "<span>$success</span>";
					 }
                ?>  
				<div class="form-block">
				
						<strong><Label for="login" class="labelID">Identifiant </Label></strong>
							<input type="email" placeholder="Email" name="login" required> </br>
							
						<strong><Label for="mdp" class="labelPass">Mot de passe </Label></strong>
							<input id="mdp" type="password" placeholder="Mot de passe"name="mdp" required>
						    <i id="oeil" class="bi bi-eye-slash" id="togglePassword" onclick="showPass()"></i></br>
						
					<div id="Validation-Form">
						<input type="submit" id="loginButton" name="action" value="Connexion">
						<button id="signLink"><a href="sign.php">Inscription</a></button>
					</div>
				</div>
			</form>
			<?php
				unset($_SESSION["error"]);
				unset($_SESSION["success"]);
			?>
		</div>
		<div id="lienBonus"><a href="nouveaupass.php">Mot de passe oublié ?</a></div>
		
		

</body>