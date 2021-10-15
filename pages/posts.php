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
		<form method="POST" id="postForm" action="../config/post-action.php" enctype="multipart/form-data">
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
                <br>
                <?php
                if (isset($_SESSION['error'])) {
                    $error = $_SESSION['error'];
                    echo $error;
                }
                ?>
                <br>
                <input type ="file" name="my_image" style="position: relative; top: 20%;">


                <button name="new_post">Ajouter le Post</button>
		</form>
		<?php
			unset($_SESSION["error"]);
			unset($_SESSION["success"]);
		?>
	</div>

</div>


<button name="retour" id="retourPost"><a href="../index.php">Annuler</</button>





</body>