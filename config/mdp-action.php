<?php 

$email = $_POST['email'];
$headers = 'From: houlaid.ahamada@gmail.com';	


if(isset($_POST['submit_email']) && $_POST['email'])
{
	//Connexion à la BD et requête
	
	mysql_connect('mysql-projetweb2.alwaysdata.net','245104_vanes','marioChampi');
	mysql_select_db('user');
	
	$select=mysql_query("select email,password from user where email='$email'");
	if(mysql_num_rows($select)==1)
	{
		while($row=mysql_fetch_array($select))
		{
		  $email=md5($row['email']);
		  $pass=md5($row['password']);
		}
		
		// Lien de réinitialisation
	$link="<a href='projetweb2.alwaysdata.net/reset.php?key=".$email."&reset=".$pass."'>Cliquez pour changer de mot de passe.</a>";
		
	$mailsent = mail($_POST['email'],'Réinitialisation de mdp',$link,$headers);
		
		$mailsent;
		
			if ($mailsent){
				echo 'Votre mail a été envoyé';
			}
	}
}



?>