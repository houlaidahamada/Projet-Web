<?php 
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Inscription</title>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../style/style.css">

    <!-- ---- Script ---- -->
    <script src="/js/jquery-3.6.0.min.js"></script>
	<script src="/js/index.js"></script>
	
	<!-- ---- Fonts ---- -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>

<body>
		<!-- ---- Formulaire d'Inscription ---- -->
		<div class id="signForm">
			<form action="../config/sign-action.php" method="post">
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
					<strong><Label class="labelEmail">Email</Label></strong>
						<input type="text" placeholder="Identifiant" name="email"> </br>
					<strong><Label class="labelPass"> Mot de Passe </Label></strong>
						<input type="password" placeholder="Mot de passe" name="mdp"> </br>
					<strong><Label class="labelConfirmPass">Confirmation de Mot de Passe </Label></strong>
						<input type="password" placeholder="Mot de passe" name="mdp-confirm"> </br>
					<div id="Validation-Form">
						<input type="submit" id="signButton" name="action" value="Inscription">
						<button id="loginLink"><a href="login.php">Connexion</a></button>
					</div>
				</div> 
			</form>
			<?php
    unset($_SESSION["error"]);
?>
		</div>
		
		

</body>