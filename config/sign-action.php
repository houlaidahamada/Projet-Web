<?php
 $host = 'mysql-projetweb2.alwaysdata.net';
 $login = '245104';
 $mysqlpass = 'marioChampi';
 $dbLink = mysqli_connect($host, $login, $mysqlpass) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
 mysqli_select_db($dbLink, 'projetweb2_vanes')  or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));?>



<?php
	$action = $_POST['action'];
	$email = $_POST['email'];
	$mdp = md5($_POST['mdp']);	
	$mdpconfirm = md5($_POST['mdp-confirm']);
?>

<?php
	session_start();
	if(($mdp == $mdpconfirm) && ($mdp != NULL) && ($email != NULL)){
		$query = "INSERT INTO user (Email, Mdp) VALUES ('$email', '$mdp')";
		 if(!($dbResult = mysqli_query($dbLink, $query))){
				 echo 'Erreur dans requête<br />'; 
				 //Affiche le type d'erreur. echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
				 
				 echo 'Requête : ' . $query . '<br/>';
				 //Affiche la requête envoyée.
				 exit();
			}
		else{
				header('Location: ../pages/login.php');
				echo "Vous allez recevoir un mail à l'adresse indiquée.";
			}
	}
	else
	{
		header('Location: ../pages/sign.php');
		echo "Veuillez renseigner des informations valides.";
	}
?>