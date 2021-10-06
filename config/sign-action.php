<?php
 $host = '127.0.0.1';
 $login = 'root';
 $dbLink = mysqli_connect($host, $login)
 or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
?>

<?php
 mysqli_select_db($dbLink , 'projet-web') or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink)
);?>



<?php
	$action = $_POST['action'];
	$email = $_POST['email'];
	$mdp = md5($_POST['mdp']);	
	$mdpconfirm = md5($_POST['mdp-confirm']);
?>

<?php
	if($mdp == $mdpconfirm){
		$query = "INSERT INTO user (Email, Mdp) VALUES ('$email', '$mdp')";
		 if(!($dbResult = mysqli_query($dbLink, $query))){
				 echo 'Erreur dans requête<br />'; 
				 //Affiche le type d'erreur. echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
				 
				 echo 'Requête : ' . $query . '<br/>';
				 //Affiche la requête envoyée.
				 exit();
			}
		else{
				echo "Vous allez recevoir un mail à l'adresse indiquée.";
			}
	}
	else
	{
		echo 'Les mots de passes ne correspondent pas.';
	}
?>