<?php
	 $host = 'mysql-projetweb2.alwaysdata.net';
	 $login = '245104';
	 $mysqlpass = 'marioChampi';
	 $dbLink = mysqli_connect($host, $login, $mysqlpass) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
	 mysqli_select_db($dbLink , 'projetweb2_vanes') or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
	 


	 if(isset($_GET['new_post']))
	 {
		 $title = $_GET['title'];
		 $content = $_GET['content'];
		 $keywords = $_GET['keywords'];


		$query = "INSERT into posts(title, content, keywords) VALUES('$title', '$content', '$keywords')";
		mysqli_query($dbLink, $query);
	 }
?>

