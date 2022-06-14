<?php
include_once "includes/functions.php";

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
$posts = get_posts($id);
$genres = get_genres($id);
$artists = get_artists($id);

$title = 'Жанры';
include_once "includes/header.php";
?>
<link rel="stylesheet" href="/pages/css/style-chart.css">

<div class="content-container">
    <?php include_once "includes/aside.php"; ?>
    <!-- aside -->

    <main class="content">
        <div class="page-main-line">
            <div class="page-info">
                <a href="javascript:history.back()">
                    <button class="back-button">
                        <img src="/pages/img/back.svg" alt="Назад">
                    </button>
                </a>
                <h4 class="page-text">Жанры</h4>
            </div>
            <div class="artist-cards">
                <?php if ($genres) { ?>
                    <?php foreach ($genres as $genre) { ?>
                        <a class="artist-card" href="<?php echo get_url('genre?id=' . $genre['genre_id']); ?>">
                            <div class="avatar-card">
                                <img class="avatar" width="130" height="130" src="<?php echo $genre['genre_img'] ?>" alt="Аватар">
                            </div>
                            <div class="card-about">
                                <span class="artist-card-name"><?php echo $genre['name_genre'] ?></span>
                            </div>
                        </a>
                    <?php } ?>
                <?php } else {
                    echo "Похоже что-то отломалось, увы :(";
                } ?>
            </div>
            <!-- page-genre-cards -->
        </div>
    </main>
</div>
<script src="<?php echo get_url('/pages/app.php'); ?>"></script>