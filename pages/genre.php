<?php
include_once "includes/functions.php";

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
$posts = get_posts($id);
$genres = get_genres($id);
$list_music_genres = get_genres_music($id);
$genres_music_list = get_genres_list($id);

$title = 'Жанр | ' . $genres_music_list[0]['name_genre'];
include_once "includes/header.php"; ?>

<link rel="stylesheet" href="/pages/css/style-chart.css">

<div class="content-container">
    <?php include_once "includes/aside.php"; ?>

    <main class="content">
        <div class="page-main-line">
            <div class="page-info">
                <a href="javascript:history.back()">
                    <button class="back-button">
                        <img src="/pages/img/back.svg" alt="Назад">
                    </button>
                </a>
                <h4 class="page-text-title">Жанр |</h4>
                <h4 class="page-text"><?php echo $genres_music_list[0]['name_genre'] ?></h4>
            </div>

            <div class="page-main-tracks">
                <?php if ($list_music_genres) { ?>
                    <div class="page-main__tracks">
                        <?php $n = 1;
                        foreach ($list_music_genres as $post) { ?>
                            <li class="songItem">
                                <span><?php echo $n++; ?></span>
                                <img src="<?php echo $post['avatar_song'] ?>" alt="poster">
                                <h5><?php echo $post['name_song'] ?> <br>
                                    <a href="<?php echo get_url('artist?id=' . $post['artist_id']); ?>">
                                        <div class="subtitle"><?php echo $post['nickname'] ?></div>
                                    </a>
                                </h5>
                                <?php $likes_count = get_likes_count($post['id_music']);
                                if (logged_in()) { ?>
                                    <div class="actions">
                                        <?php if (is_music_liked($post['id_music'])) { ?>
                                            <div class="like">
                                                <a href="<?php echo get_url('delete_like?id=' . $post['id_music']); ?>" class="music__like music__like_active"></a>
                                            </div>
                                        <?php } else { ?>
                                            <a href="<?php echo get_url('add_like?id=' . $post['id_music']); ?>" class="music__like"></a>
                                        <?php } ?>
                                        <i class="bi playListPlay bi-play-circle-fill" id="<?php echo $post['id_music'] ?>"></i>
                                    </div>
                                <?php } else { ?>
                                    <div class="actions">
                                        <a href="sign">
                                            <i class="bi playListPlay bi-play-circle-fill" id="<?php echo $post['id_music'] ?>"></i>
                                        </a>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </div>
                <?php } else {
                    echo "Увы, данного жанра нет в нашей базе:(";
                } ?>
            </div>
            <!-- page-main-track -->
        </div>
    </main>
</div>

<?php include_once "includes/audioplayer.php"; ?>