<?php 
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Reinitialisation du mot de passe</title>

    <!-- ---- Favicon ---- -->
    <link rel="icon" href="../ressources/favicon_io/favicon.ico"/>

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
		
		<!-- ---- Formulaire de Lien de Reinitialisation ---- -->
		<div id="reinitMdp">
		<!-- ----- Opérations Secrètes ---- --> 
					<?php
					if(isset($_SESSION["error"])){
							$error = $_SESSION["error"];
							echo "<span>$error</span>";
						}
					if($_GET['key'] && $_GET['reset'])
					{
						$mail = $_GET['key'];
						$pass = $_GET['reset'];
						
						$host = 'mysql-projetweb2.alwaysdata.net';
						$login = '245104';
						$mysqlpass = 'marioChampi';
						
						$dbLink = mysqli_connect($host, $login, $mysqlpass) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
						mysqli_select_db($dbLink, 'projetweb2_vanes')  or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
						
						$select = "select Email,Mdp from `user` where md5(Email)='".$mail."'";
						 if(!($dbResult = mysqli_query($dbLink, $select))){
								header('Location: nouveaupass.php');
								$_SESSION['error'] = "Erreur, veuillez refaire une demande.";
						}
						else{
						$rows = mysqli_num_rows($dbResult);
						if($rows == 1)
						{
					?>
			<form action="../config/reset-action.php" method="post">
				<!-- ----- Blabla de Sessions ---- -->
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
						<input type="hidden" name="email" value="<?php echo $mail;?>">
						<strong><Label for="mdp" class="labelPass">Mot de Passe</Label></strong>
							<input id="mdp" type="password" placeholder="Mot de passe" name="mdp" required>
							<i id="oeil" class="bi bi-eye-slash" id="togglePassword" onclick="showPass()"></i></br>
							
						<strong><Label for="mdp-confirm" class="labelConfirmPass">Confirmation de Mot de Passe </Label></strong>
							<input id="mdp2" type="password" placeholder="Mot de passe" name="mdp-confirm" required> 
							<i id="oeil2" class="bi bi-eye-slash" id="togglePassword" onclick="showPass2()"></i></br>
							
					<div id="Validation-Form">
						<input type="submit" id="loginButton" name="pass_change" value="Confirmation">
					</div>
				</div>
			</form>
			<?php
			}			
		}
	}
			?>
			<?php
				unset($_SESSION["error"]);
				unset($_SESSION["success"]);
			?>
		</div>
</body>