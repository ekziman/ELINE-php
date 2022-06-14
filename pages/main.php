<?php 
include_once "includes/functions.php";
$title = 'Главная страница';

$posts = get_posts();
$genres = get_genres();
$new_releases = get_new_releases();
$artists = get_artists();

include_once "includes/header.php"; 
include_once "includes/content.php";
include_once "includes/audioplayer.php";

?>