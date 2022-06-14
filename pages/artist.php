<?php
include_once "includes/functions.php";

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
$posts = get_posts($id);
$genres = get_genres($id);
$artists = get_artists($id);

$title = 'Артист | ' . $artists[0]['nickname'];
$image = $artists[0]['avatar'];
$description = $artists[0]['description'];

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
                <h4 class="page-text-title">Исполнители |</h4>
                <h4 class="page-text"><?php echo $artists[0]['nickname'] ?></h4>
            </div>
            <div class="about_artist">
                <div class="img_link">
                    <img class="img_artist" width="200" height="200" src="<?php echo $artists[0]['avatar'] ?>" alt="">
                    <div class="my_source">
                        <?php if ($artists[0]['source_vk'] == '') { ?>
                        <?php } else { ?>
                            <a href="<?php echo $artists[0]['source_vk'] ?>">
                                <img class="fave-vk" src="/pages/img/social_media/fave-vk.svg" alt="link">
                            </a>
                        <?php } ?>

                        <?php if ($artists[0]['source_tg'] == '') { ?>
                        <?php } else { ?>
                            <a href="<?php echo $artists[0]['source_tg'] ?>">
                                <img class="fave-tg" src="/pages/img/social_media/fave-tg.svg" alt="link">
                            </a>
                        <?php } ?>

                        <?php if ($artists[0]['source_inst'] == '') { ?>
                        <?php } else { ?>
                            <a href="<?php echo $artists[0]['source_inst'] ?>">
                                <img class="fave-inst" src="/pages/img/social_media/fave-inst.svg" alt="link">
                            </a>
                        <?php } ?>

                        <?php if ($artists[0]['source_yt'] == '') { ?>
                        <?php } else { ?>
                            <a href="<?php echo $artists[0]['source_yt'] ?>">
                                <img class="fave-yt" src="/pages/img/social_media/fave-yt.svg" alt="link">
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="name">
                    <div class="nickname"><?php echo $artists[0]['nickname'] ?></div>
                    <div class="description"><?php echo $artists[0]['description'] ?></div>
                </div>

            </div>
            <div class="page-main-tracks">
                <?php if ($posts) { ?>
                    <div class="page-main__tracks">
                        <?php $n = 1;
                        foreach ($posts as $post) { ?>
                            <li class="songItem">
                                <span><?php echo $n++; ?></span>
                                <img src="<?php echo $post['avatar_song'] ?>" alt="poster">
                                <h5><?php echo $post['name_song'] ?> <br>
                                    <div class="subtitle"><?php echo $post['nickname'] ?></div>
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
                    echo "Увы, музыку вы больше не послушаете:(";
                } ?>
            </div>
            <!-- page-main-track -->
        </div>
    </main>
</div>

<?php include_once "includes/audioplayer.php"; ?>