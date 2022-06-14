<?php
include_once "includes/functions.php";

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchArtist = searchArtist($_POST['search']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchMusic = searchMusic($_POST['search']);
}

$genres = get_genres($id);
$artists = get_artists($id);
$error = get_error_message();
$posts = get_posts($id);

$title = 'Результат поиска' . $search;
?>

<head>
    <link rel="stylesheet" href="/pages/css/style-chart.css">
</head>

<?php include_once "includes/header.php"; ?>
<!-- header -->
<div class="content-container">
    <?php include_once "includes/aside.php"; ?>
    <main class="content">
        <div class="page-main-line">
            <?php if (empty($searchArtist) && empty($searchMusic)) { ?>
                <div class="undefined">Ничего не найдено</div>
            <?php } ?>

            <?php if (empty($searchArtist)) {
                echo ""; ?>
            <? } else { ?>
                <div class="page-info">
                    <h4 class="page-text">Исполнители</h4>
                </div>
                <div class="artist-cards">
                    <?php foreach ($searchArtist as $artist) { ?>
                        <a class="artist-card" href="<?php echo get_url('artist?id=' . $artist['id']); ?>">
                            <div class="avatar-card">
                                <img class="avatar" width="130" height="130" src="<?php echo $artist['avatar'] ?>" alt="Аватар">
                            </div>
                            <div class="card-about">
                                <span class="artist-card-name"><?php echo $artist['nickname'] ?></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <!-- page-artist-cards -->

            <?php if (empty($searchMusic)) {
                echo "";
            } else { ?>
                <div class="page-info">
                    <h4 class="page-text">Вся музыка</h4>
                </div>
                <div class="page-main-tracks">
                    <div class="page-main__tracks">
                        <div class="page-main__tracks">
                            <?php $n = 1;
                            foreach ($searchMusic as $post) { ?>
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
                    </div>
                <?php } ?>
                <!-- page-main-track -->
                </div>
    </main>
</div>
<?php include_once "includes/audioplayer.php"; ?>