<?php
session_start();

?>


<html>
<uf charset="UTF-8"
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>VANESGRAM</title>

    <!-- ---- Favicon ---- -->
    <link rel="icon" href="../ressources/favicon_io/favicon.ico"/>

    <!-- ---- CSS ---- -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../style/user.css"
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
            <li class="items"><a href="../index.php">Accueil</a></li>
            <li class="items"><a href="../pages/user.php">Compte</a></li>
            <li class="items"><a href="../config/deconnexion.php" >Deconnexion</a></li>
            <li class="btn"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
    </nav id="navigationMenu">
</header>


                <!-- Titre de la section-->
                <?php
                if(!isset($_SESSION['name'])){

                    $_SESSION['name'] = $_SESSION['login'];

                }?>
                <?php
                if (isset($_SESSION['suid'])){


                    echo "
                        <body id='page-user'>

    <div style='display: flex;
            flex-direction: column;
            align-items: center;'>
        <ul style='
            width: 35%;
            padding: 0;
            margin: 0;'>
            <div id ='titre' style='display: flex;
            flex-direction: column;
            align-items: center; width: 100%;
             background: rgba( 97, 194, 214, 0.4 );
                box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                backdrop-filter: blur( 4px );
                -webkit-backdrop-filter: blur( 4px );
                border-radius: 10px;
                border: 1px solid rgba( 255, 255, 255, 0.18 );'>
                        <div id='salutations' style='display: flex;
                        flex-direction: column;
                        align-items: center;
                        width: 100%;
                        font-family: Montserrat;'>
                    <!-- Salutation du membre -->
                    <h3>Bienvenue dans vos parametres ";
                    echo($_SESSION['name']);
                    echo "</h3><br>
                    <div id='aleatlike'>
                    <div class='slidecontainer''>
                        Min : <input type='range'' min='1' max='10' value='5' class='slider' id='min'>
                    </div>
                    <p >Value :<span id='value'></span></p>
                    <div class='slidecontainer'>
                        Max : <input type='range' min='10' max='50' value='15' class='slider' id='max'>
                    </div>
                    <p >Value :<span id='value2'></span></p>
    
                </div>
                <div id='rename'>";

                    echo 'Pseudo Actuel : ' . $_SESSION['name'];
                    echo "
                    
                    <br>
                    <br>
                    <label for='name'>Changer de pseudo :</label>
                    <form method='POST' action='../config/rename.php'>
                        <input type='text' id='name' name='name' required
                                 minlength='4' maxlength='14' size='14'>
                        </input>
                    </form>
    
    
    
    
                </div>
                <div id='supr' style='display: flex;
                flex-direction: column;
                align-items: center;>
                    <input class='delete'
                           type='submit'
                           value='Supprimer son compte'
                           style='display: flex;
                flex-direction: column;
                align-items: center;'><br>
                    <!-- Code sql de suppresion du membre -->
                </div>
    
            </ul>
    
    
        </div>";

                    if(isset($_SESSION['error']))
                    { 
                        $error = $_SESSION['error'];
                        echo '<span>$error</span>';
                    }

                }
                ?>


</body>
<script src="../js/Slider.js"></script>
</html>