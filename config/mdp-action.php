<?php 

session_start();

$email = $_POST['email'];
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From : VaneSTAFF <projetweb2@alwaysdata.net>' . "\r\n";
$host = 'mysql-projetweb2.alwaysdata.net';
$login = '245104';
$mysqlpass = 'marioChampi';


if(isset($_POST['submit_email']) && $_POST['email'])
{
	//Connexion à la BD et requête
	
	$dbLink = mysqli_connect($host, $login, $mysqlpass) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
	mysqli_select_db($dbLink, 'projetweb2_vanes')  or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
	
	$select="select Email,Mdp from user where email='$email'";
	 if(!($dbResult = mysqli_query($dbLink, $select))){
								header('Location: ../pages/nouveaupass.php');
								$_SESSION['error'] = "Adresse Mail inconnue, veuillez refaire votre demande.";
	 }
	else{
			$rows = mysqli_num_rows($dbResult);
			if($rows==1)
			{
				while($row=mysqli_fetch_array($dbResult))
				{
				  $mail=md5($row['Email']);
				  $pass=($row['Mdp']);
				}
				// Lien de réinitialisation
				$link="<a href='projetweb2.alwaysdata.net/pages/reset.php?key=".$mail."&reset=".$pass."'>Cliquez ici pour changer de mot de passe.</a>";
				
				$mailsent = mail($_POST['email'],'Reinitialisation de Mot de Passe',$link,$headers);
				if ($mailsent){
						header('Location: ../pages/nouveaupass.php'); 
						$_SESSION['success'] = "Votre mail a été envoyé";
					}
					else
					{
						header('Location: ../pages/nouveaupass.php');
						$_SESSION['error'] = "Erreur lors de l'envoi";
					}
			}
	}
}



?>