<?php
include 'db_connect.php';
if (isset($_POST['delete'])){
    $delete = 'DELETE * FROM posts WHERE id = '.'\'$post\''.'[\'id\']';
    mysqli_query($dbLink, $delete);
}