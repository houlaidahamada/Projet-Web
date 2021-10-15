<?php
    session_start();
    $newname = $_POST['name'];
    if(isset($_POST['name'])){
     header('Location: ../pages/user.php');
     $_SESSION['name'] = $newname;
    }
    else
    {
        header('Location: ../pages/user.php');
        $_SESSION['error'] = "Nous n'avons pas pu changer votre Pseudo";
    }

?>
