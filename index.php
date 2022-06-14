<?php 
require "system/routing.php";
$url = key($_GET);

$r = new Router();
$r->addRoute("/", "main.php");
$r->addRoute("/sign", "sign.php");
$r->addRoute("/register", "register.php");

$r->addRoute("/account", "account.php");
$r->addRoute("/support", "support.php");
$r->addRoute("/liked", "liked.php");
$r->addRoute("/termsofuse", "termsofuse.php");

$r->addRoute("/chart", "chart.php");
$r->addRoute("/genres", "genres.php");
$r->addRoute("/artists", "artists.php");
$r->addRoute("/feedback", "feedback.php");
$r->addRoute("/search", "search.php");

$r->addRoute("/artist", "artist.php");
$r->addRoute("/genre", "genre.php");

$r->addRoute("/add_like", "includes/add_like.php");
$r->addRoute("/delete_like", "includes/delete_like.php");

$r->route("/".$url);
?>
