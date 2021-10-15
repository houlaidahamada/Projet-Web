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


		$query = "INSERT into posts(title, content, keywords,created_at) VALUES('$title', '$content', '$keywords','$date')";
		if(!($dbResult = mysqli_query($dbLink, $query))){
				header("Location: ../pages/posts.php");
				$_SESSION['error'] = "Erreur lors de l'envoi du Post";
			}
			else
			{
				header("Location: ../index.php");
				$_SESSION['success'] = "Votre Post a été envoyé.";
				class post
				{
					public $_likes = 0;
					public $_lol = 0;
					public $_cool = 0 ;
					public $_love = 0;
					public $_waw = 0;
					public $_colere = 0;
					public $_NumPost = 0;
					public function poster($NumPost)
					{
						$post = new Post;

						$NumPost += $NumPost;
					}
					public function	avote(){

					}
					public function liker($_like)
					{
						$this->_likes = $this->_likes + 1;
					}
					public function loler($_lol)
					{
						$this->_lol = $this->_lol + 1;
					}
					public function cooler($_cool)
					{
						$this->_cool = $this->_cool + 1;
					}
					public function lover($_love)
					{
						$this->_love = $this->_love+ 1;
					}
					public function wawer($_waw)
					{
						$this->_waw = $this->_waw + 1;
					}
					public function colerer($_colere)
					{
						$this->_colere = $this->_colere + 1;
					}

				}
			}
	 }
?>

