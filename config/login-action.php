<?php
 $host = '127.0.0.1';
 $root = 'root';
 $dbLink = mysqli_connect($host, $root) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
 $user = $_POST['login'];
 $pwd = md5($_POST['mdp']);
 mysqli_select_db($dbLink , 'projet-web') or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
 $erreur = 'Mauvais id et/ou mdp.';
?>


<?php
	session_start();
	$query = "SELECT * FROM User WHERE Email='$user' AND Mdp='$pwd '";
		 if(!($dbResult = mysqli_query($dbLink, $query))){
			 echo 'Erreur dans requête<br />'; 
			 // Affiche le type d'erreur. echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
			 
			 echo 'Requête : ' . $query . '<br/>';
			 // Affiche la requête envoyée.
			 exit();
	}
		else{
			$rows = mysqli_num_rows($dbResult);
				if($rows==1)
				{
					$_SESSION['login'] = $user;
					$_SESSION['password'] = $pwd;
					$_SESSION['suid'] = session_id();
					header("Location: ../index.php");
				}
				else
				{
					header("Location: ../pages/login.php");
					$_SESSION['error'] = $erreur;
			}
					
	}
	
	
	
	
		
?>