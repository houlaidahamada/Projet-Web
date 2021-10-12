<?php 
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nouveau Mot de Passe</title>

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

<body id="passBody">
	<div id="forgetForm"> 
		<div class="form-block">
		
			<!-- ---- Formulaire d'oubli de MDP ---- -->
			<form method="POST" action="../config/mdp-action.php">
			
			<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
					else if(isset($_SESSION['suid']))
					 {
						header('Location: ../index.php');
					 }
					 else if(isset($_SESSION['success']))
					 {
						 $success = $_SESSION['success'];
						 echo "<span>$success</span>";
					 }
                ?>  
				
				  <p>Entrez votre adresse Mail pour recevoir le lien de réinitialisation.</p>
				  <input type="email" name="email" required>
				  <input id="forgetSubmit" type="submit" name="submit_email">
				  <button><a href="login.php">Retour</a></button>
			</form>
			<?php
				unset($_SESSION["error"]);
				unset($_SESSION["success"]);
			?>
		</div>
	</div>
  </body>