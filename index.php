<?php
session_start();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>VANESGRAM</title>
    <meta name="description" content="Réseau social de la star du net VANESTARRE">

    <!-- ---- Favicon ---- -->
    <link rel="icon" href="ressources/favicon_io/favicon.ico"/>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- ---- Script ---- -->
    <script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/index.js"></script>
	<script src="js/navbar.js"></script>
	<script src="js/searchbar.js"></script>
	<script src="js/hideEmoji.js"></script>
	
	<!-- ---- Fonts ---- -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

</head>

<header id="navHeader">
		<nav id="navigationMenu">
        			  <ul>
        				 <li class="logo">Vanesgram</li>
                         <li class="items"><a href="index.php">Accueil</a></li>
                         <?php
                            if(($_SESSION['statut'] == 'admin') || ($_SESSION['statut'] == 'superuser')){
        				        echo "<li class='items'><a href='pages/user.php'>Utilisateur</a></li>";
        				    }
        				    else
        				    {
        				        echo "<li class='items'><a href='pages/sign.php'>Inscription</a></li>";
        				    }
        				 ?>
        				 <li class="items"><a href="config/deconnexion.php">
						<?php
						 if(!isset($_SESSION['statut'])){
							echo 'Connexion';
						 }
						 if(($_SESSION['statut'] == 'admin') || ($_SESSION['statut'] == 'superuser')){
							 echo 'Deconnexion';
						 }
						 ?>
						 </a></li>
        				 <li class="btn"><a href="#"><i class="fas fa-bars"></i></a></li>
                         <li class="items"><a href="#" onclick="afficherBarre()">Recherche</a></li>
                      </ul>
        </nav>
</header>


<body id="bodyPrincipal">

	<div id="contenu">
	    <?php
		 if($_SESSION['statut'] == 'admin'){
			echo "<button id='postCreation'><a href='pages/posts.php'>Nouveau Post</a></button>";
			}
		?>
		
		<div class="barreFlex" style="display: flex; flex-direction: row;">
			<div class="Barre" style="display: none; margin-top: 10px;">
				<form action="" method="GET" name="">
					<div class="form-outline">
						<input type="search" name="searchBar" id="searchBar" class="form-control" placholder="Recherche" autocomplete='on'>
					</div>
				
					<button type="submit" class="btn btn-primary" name="">
						<i class="fas fa-search"></i>
					</button>
				</form>
			</div>
		</div>
			
			<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
					 else if(isset($_SESSION["success"]))
					 {
						 $success = $_SESSION["success"];
						 echo "<span>$success</span>";
					 }
                ?>	
		
	</div>
	
	<div class="postsList">
		<div id="searchResult" style="
    display: flex;
    flex-direction: column;
    width: 50%;
    ">
		<?php include 'config/search-action.php'?>
		<div id="timeline">
		<?php
		    include 'config/likes.php';
			require_once ('config/db_connect.php');

			$sql = 'SELECT * FROM posts ORDER BY created_at;';
			$query = mysqli_query($dbLink, $sql);
			while($post = mysqli_fetch_assoc($query)){
            				$posts[] = $post;
            				$titre = $post['title'];
            				$contenu = $post['content'];
                            $keywords = $post['keywords'];
                            $image_url = $post['image_url'];


                            if(($_SESSION['statut'] == 'admin') || ($_SESSION['statut'] == 'superuser'))
            					{
            						echo "
            								<form method='POST' action=''>
            								<article id='newPost'>
            								<article>
            								<h1>$titre</h1>
            								<p>$contenu</p>
            								<p>β$keywords</p>";
            								if($image_url != NULL){
            								 echo "<p><img src='/images/$image_url' style='width: 100%;'></p>";
            								 }
            								 echo"
            								</form>
            								</article>".
            								likes().
            								"</article>";
            					}
            					else{
                                echo "
                                <form method='POST' action=''>
                                <article id='newPost'>
                                <article>
                                <h1>$titre</h1>
                                <p>$contenu</p>
                                 <p>β$keywords</p>";
                                if($image_url != NULL){
                                   echo "<p><img src='/images/$image_url' style='width: 100%;'></p>";
                                   }
                                   echo "
                                </article>
                                </article>"
                                ;
                                }
            				}
			?>
			 </div>


	<?php
		unset($_SESSION["error"]);
		unset($_SESSION["success"]);
	?>
	
</body>
</html>
