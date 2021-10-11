<?php
session_start();

if(!isset($_SESSION['suid']))
{
    header('Location: pages/login.php');
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>VANESTARRE</title>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- ---- Script ---- -->
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>

    <!-- ---- Fonts ---- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

</head>

<header id="navHeader">
		<nav id="navigationMenu">
        			  <ul>
        				 <li class="logo">Vanestarre</li>
                         <li class="items"><a href="index.php">Accueil</a></li>
        				 <li class="items"><a href="pages/user.php">Utilisateur</a></li>
        				 <li class="items"><a href="config/deconnexion.php">Deconnexion</a></li>
        				 <li class="btn"><a href="#"><i class="fas fa-bars"></i></a></li>
                         <li class="items"><a href="#">Recherche</a></li>
                      </ul>
        </nav>
</header>

<body>

</body>