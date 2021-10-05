<?php 
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Login</title>

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
		<!-- ---- Formulaire de Connexion ---- -->
		<div class id="loginForm">
			<form action="../config/login-action.php" method="post">
			<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
					else if(isset($_SESSION['suid']))
					 {
						header('Location: ..index.php');
					 }
                ?>  
				<div class="form-block">
					<Label><strong> Identifiant </strong></Label>
						<input type="text" placeholder="Identifiant" name="login"> </br>
					<Label><strong> Mot de Passe </strong></Label>
						<input type="password" placeholder="Mot de passe"name="mdp" > </br>
						<strong><input type="submit" id="loginButton" name="action" value="Connexion"></strong>
				</div> 
			</form>
			<?php
    unset($_SESSION["error"]);
?>
		</div>
		
		

</body>