<?php
$dbLink = mysqli_connect($host, $root) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
mysqli_select_db($dbLink , 'projet-web') or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
?>