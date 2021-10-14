<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../style/style.css">

    <!-- ---- Script ---- -->
    <script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/index.js"></script>
	<script src="/js/validationform.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	
	<!-- ---- Fonts ---- -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

</head>

<body id="postBody">
	
<div class="centrePost">	
	<div class="boitePost">
		<h2>Nouveau Post</h2>
		<form method="GET" id="postForm" action="../config/post-action.php">
				<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
					else if(isset($_SESSION['suid']))
					 {
						header('Location: ../index.php');
					 }
					 else if(isset($_SESSION["success"]))
					 {
						 $success = $_SESSION["success"];
						 echo "<span>$success</span>";
					 }
                ?>
				<input type="text" name="title" placeholder="Titre Post" required>
				<textarea name="content" placeholder="Taille maximale de 50 caractères." required maxlength='50'></textarea>
                <input type="text" id="keywords" name="keywords" placeholder="Mots cléfs" required>
				<button name="new_post">Ajouter le Post</button>
		</form>
		<?php
			unset($_SESSION["error"]);
			unset($_SESSION["success"]);
		?>
	</div>

    <div class="Posts_published">
        <h2>Post</h2>
        <?php
        require_once ('../config/db_connect.php');

        $sql = 'SELECT title, content FROM posts ORDER BY created_at;';
        $query = mysqli_query($dbLink, $sql);
        $posts = mysqli_fetch_assoc($query);

        foreach($posts as $post)
        {
            echo $post['title'];
            echo $post['content'];
        }
        ?>
    </div>
</div>


<button name="retour" id="retourPost"><a href="../index.php">Annuler</</button>


<nav>
    <?php include ('../config/pagination.php'); ?>
    <ul class="pagination">
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $nb_page; $page++): ?>
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
        <li class="page-item <?= ($currentPage == $nb_page) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>


</body>