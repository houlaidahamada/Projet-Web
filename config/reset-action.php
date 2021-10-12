<?php
 	session_start();
	$host = 'mysql-projetweb2.alwaysdata.net';
	$login = '245104';
	$mysqlpass = 'marioChampi';
?>



<?php
	$mail = $_POST['email'];
	$pass = md5($_POST['mdp']);
	$passconfirm = md5($_POST['mdp-confirm']);


	if(!is_null(($_POST['pass_change']) && ($_POST['email'])))
	{
		$dbLink = mysqli_connect($host, $login, $mysqlpass) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
		mysqli_select_db($dbLink, 'projetweb2_vanes')  or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
		
		$update="UPDATE `user` SET `Mdp`='$pass' where MD5(Email) = '".$mail."'";
		
		if(!($dbResult = mysqli_query($dbLink, $update))){
				header("Location: ../pages/login.php");
				$_SESSION['error'] = "Veuillez refaire votre demande s'il vous plaît.";
		}
		else
		{
				header("Location: ../pages/login.php");
				$_SESSION['success'] = "Votre mot de passe a été modifié !";
		}
	}

?>