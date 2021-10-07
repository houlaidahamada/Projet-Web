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

	<script src="/js/validationform.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	
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
		<!-- ---- Formulaire d'Inscription ---- -->
		<div id="signForm">
			<form class="boiteAValider" action="../config/sign-action.php" method="post">
			
			<!-- ----- Redirection si déjà connecté ---- -->
			<?php
           if(isset($_SESSION['suid']))
					 {
						header('Location: ../index.php');
					 }?>  
				
				<span id="error"></span>
				<div class="form-block">
				
						<strong><Label for="email" class="labelEmail">Email</Label></strong>
							<input type="email" placeholder="Identifiant" name="email" required> </br>
							
						<strong><Label for="mdp" class="labelPass">Mot de Passe</Label></strong>
							<input type="password" placeholder="Mot de passe" name="mdp" required> </br>
							
						<strong><Label for="mdp-confirm" class="labelConfirmPass">Confirmation de Mot de Passe </Label></strong>
							<input type="password" placeholder="Mot de passe" name="mdp-confirm" required> </br>
						

					<div id="Validation-Form">
						<input type="submit" id="signButton" name="action" value="Inscription">
						<button id="loginLink"><a href="login.php">Connexion</a></button>
					</div>

				</div> 
			</form>
		</div>
</body>


