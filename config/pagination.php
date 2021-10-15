<?php
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
require_once ('../config/db_connect.php');

$sql = 'SELECT COUNT(*) AS nb_posts FROM posts;';
$query = mysqli_query($dbLink, $sql);
$result = mysqli_fetch_assoc($query);
$nb_posts = $result['nb_posts'];

$posts_by_page = 10;
$nb_page = ceil($nb_posts/$posts_by_page);

$first_page = ($currentPage * $posts_by_page) - $posts_by_page;

$sql2 = 'SELECT * FROM posts ORDER_BY created_at DESC LIMIT $first_page $posts_by_page;';
$query2 = mysqli_query($dbLink, $sql2);
$posts = mysqli_fetch_assoc($query2);
?>


