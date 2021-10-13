<?php
session_start();

if(!isset($_SESSION['suid']))
 {
	header('Location: pages/login.php');
 }

?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>VANESTARRE</title>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- ---- Script ---- -->
    <script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/index.js"></script>
	<script src="js/navbar.js"></script>
	<script src="js/searchbar.js"></script>
	
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
                         <?php
                            if(($_SESSION['statut'] == 'admin') || ($_SESSION['superuser'])){
        				        echo "<li class='items'><a href='pages/user.php'>Utilisateur</a></li>";
        				    }
        				 ?>
        				 <li class="items"><a href="config/deconnexion.php">Deconnexion</a></li>
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
                            if(($_SESSION['statut'] == 'admin') || ($_SESSION['statut'] == 'superuser'))
            					{
            						echo "
            								<form method='POST' action=''>
            								<article id='newPost'>
            								<article>
            								<h1>$titre</h1>
            								<p>$contenu</p>
            								<p>β$keywords</p>
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
                                <p>β$keywords</p>
                                </article>".
                                    likes().
                                "</article>"
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
