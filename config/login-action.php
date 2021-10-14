<?php
 $host = 'mysql-projetweb2.alwaysdata.net';
 $login = '245104';
 $mysqlpass = 'marioChampi';
 $dbLink = mysqli_connect($host, $login, $mysqlpass) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
 mysqli_select_db($dbLink, 'projetweb2_vanes')  or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

 $user = $_POST['login'];
 $pwd = md5($_POST['mdp']);
 $erreur = 'Mauvais id et/ou mdp.';
?>

<?php
			session_start();
			$admincheck = "SELECT * FROM user WHERE Email='$user' AND Mdp='$pwd' AND type='1'";
			$superusercheck = "SELECT * FROM user WHERE Email='$user' AND Mdp='$pwd' AND type='2'";
			$usercheck = "SELECT * FROM user WHERE Email='$user' AND Mdp='$pwd' AND type='3'";

			if($Result = mysqli_query($dbLink, $admincheck)){
					$rows2 = mysqli_num_rows($Result);
					if($rows2==1){
						$_SESSION['statut'] = 'admin';
						$_SESSION['login'] = $user;
						$_SESSION['password'] = $pwd;
						$_SESSION['suid'] = session_id();
						header("Location: ../index.php");
					}
			}
			else
			{
				header("Location: ../pages/login.php");
				$_SESSION['error'] = mysqli_error($dbLink);
			}
			
			if($Result = mysqli_query($dbLink,$superusercheck)){
				$rows2 = mysqli_num_rows($Result);
					if($rows2==1){
						$_SESSION['statut'] = 'superuser';
						$_SESSION['login'] = $user;
						$_SESSION['password'] = $pwd;
						$_SESSION['suid'] = session_id();
						header("Location: ../index.php");
					}
				}
			else
			{
				header("Location: ../pages/login.php");
				$_SESSION['error'] = mysqli_error($dbLink);
			}
			
			if($Result = mysqli_query($dbLink,$usercheck)){
					$rows2 = mysqli_num_rows($Result);
					if($rows2==1){
						$_SESSION['statut'] = 'user';
						$_SESSION['login'] = $user;
						$_SESSION['password'] = $pwd;
						$_SESSION['suid'] = session_id();
						header("Location: ../index.php");
					}
				}
			else
			{
				header("Location: ../pages/login.php");
				$_SESSION['error'] = mysqli_error($dbLink);
			}

?>