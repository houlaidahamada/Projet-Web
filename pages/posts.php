<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../style/style.css">

    <!-- ---- Script ---- -->
    <script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/index.js"></script>
	<script src="/js/validationform.js"></script>
	
	<!-- ---- Fonts ---- -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

</head>

<body id="postBody">
	
	<div class="boitePost">
		<h2>Nouveau Post</h2>
		<form id="postForm" action="../config/post-action.php" method="GET">
				<input type="text" name="title" placeholder="Titre Post" required>
				<textarea name="content" required></textarea>
				<button name="new_post" required>Ajouter le Post</button>
		</form>
	</div>
</body>