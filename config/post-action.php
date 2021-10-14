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
		 $date = date("j, n, Y");

		 $img_name = $_FILES['my_image']['name'];
		 $img_size = $_FILES['my_image']['size'];
		 $tmp_name = $_FILES['my_image']['tmp_name'];
		 $error = $_FILES['my_image']['error'];

		 if ($error === 0){
			 if ($img_size > 10485760){
				 $err = "Image trop volumineuse";
				 header("Location = index.php?error=$err");
			 }
			 else
			 {
				 $file_ext = pathinfo($img_name, PATHINFO_EXTENSION);
				 $file_ext_lc = strtolower($file_ext);

				 $allowed_ext = array("jpg", "jpeg", "png");

				 if (in_array($file_ext_lc, $allowed_ext)){
					 $new_img_name = uniqid("IMG-", true).'.'.$file_ext_lc;
					 $img_upload_path = '../images/'.$new_img_name;
					 move_uploaded_file($tmp_name, $img_upload_path);

					 $sql = "INSERT INTO posts(image_url) VALUES('$new_img_name')";
					 mysqli_query($dbLink, $sql);
					 header("Location: ../index.php");

				 }
				 else
				 {
					 $err = "Type de fichier non pris en charge";
					 header("Location = index.php?error=$err");
				 }
			 }
		 }
		 else
		 {
			 $err = "Une erreur est survenue";
			 header("Location = index.php?error=$err");
		 }


		$query = "INSERT into posts(title, content, keywords,created_at) VALUES('$title', '$content', '$keywords','$date')";
		if(!($dbResult = mysqli_query($dbLink, $query))){
				header("Location: ../pages/posts.php");
				$_SESSION['error'] = "Erreur lors de l'envoi du Post";
			}
			else
			{
				header("Location: ../index.php");
				$_SESSION['success'] = "Votre Post a été envoyé.";
			}
	 }
?>

