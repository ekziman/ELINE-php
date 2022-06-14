<body>
    <div class="content-container">
        <?php include_once "aside.php"; ?>

        <main class="content">
            <div class="page-main-line">
                <div class="page-main-info">
                    <h4 class="page-text">Популярное</h4>
                    <a href="chart" class="show-more">Показать ещё</a>
                </div>
                <?php if ($posts) { ?>
                    <div class="page-main-track">
                        <div class="page-main__track-left">
                            <?php $i = 0;
                            $n = 1;
                            foreach ($posts as $post) { ?>
                                <li class="songItem">
                                    <span><?php echo $post['id_music'] ?></span>
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
                                    <?php } else {?>
                                        <div class="actions">
                                            <a href="sign">
                                                <i class="bi playListPlay bi-play-circle-fill" id="<?php echo $post['id_music'] ?>"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </li>
                            <?php $i++;
                                if ($i == 5) break;
                            } ?>
                        </div>
                        <!-- page-main__track-left -->

                        <div class="page-main__track-right">
                            <?php $i = 5;
                            $n = 6;
                            foreach ($posts as $post) { ?>
                                <li class="songItem">
                                    <span><?php echo $post['id_music'] ?></span>
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
                                    <?php } else {?>
                                        <div class="actions">
                                            <a href="sign">
                                                <i class="bi playListPlay bi-play-circle-fill" id="<?php echo $post['id_music'] ?>"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </li>
                            <?php $i++;
                                if ($i == 10) break;
                            } ?>
                        </div>
                        <!-- page-main__track-right -->
                    </div>
            </div>
        <?php } else {
                    echo "Похоже что-то отломалось, увы :(";
                } ?>
        <!-- page-main-track -->


        <div class="page-main-cards">
            <div class="new-cards">
                <div class="page-main-info">
                    <h4 class="page-text">Новые релизы</h4>
                    <a href="" class="show-more hidden">Показать ещё</a>
                </div>
                <div class="new_releases">
                    <?php if ($new_releases) { ?>
                        <?php $i = 0;
                        $n = 1;
                        foreach ($new_releases as $songItem) { ?>
                            <div class="songItem">
                                <div class="img_play">
                                    <img src="<?php echo $songItem['avatar_song'] ?>" alt="poster">
                                    <?php if (logged_in()) { ?>
                                        <i class="bi playListPlay bi-play-circle-fill" id="<?php echo $songItem['id_music'] ?>"></i>
                                    <?php } ?>
                                </div>
                                <h5><?php echo $songItem['name_song'] ?> <br>
                                    <a href="<?php echo get_url('artist?id=' . $songItem['artist_id']); ?>">
                                        <div class="subtitle"><?php echo $songItem['nickname'] ?></div>
                                    </a>
                                </h5>
                            </div>
                        <?php $i++;
                            if ($i == 5) break;
                        } ?>
                </div>
            <?php } else {
                        echo "Новых релизов нет";
                    } ?>
            </div>
            <!-- new-cards -->

            <div class="page-genre-cards">
                <div class="page-main-info">
                    <h4 class="page-text">Жанры</h4>
                    <a href="<?php echo get_url('genres'); ?>" class="show-more">Показать ещё</a>
                </div>
                <div class="genre-cards">
                    <?php if ($genres) { ?>
                        <?php $i = 0;
                        foreach ($genres as $genre) { ?>
                            <a class="genre-card" href="<?php echo get_url('genre?id=' . $genre['genre_id']); ?>">
                                <div class="avatar-card">
                                    <img class="avatar" width="130" height="130" src="<?php echo $genre['genre_img'] ?>" alt="Аватар">
                                </div>
                                <div class="card-about">
                                    <span class="genre-card-name"><?php echo $genre['name_genre'] ?></span>
                                </div>
                            </a>
                        <?php $i++;
                            if ($i == 5) break;
                        }  ?>
                    <?php } else {
                        echo "Похоже что-то отломалось, увы :(";
                    } ?>
                </div>
            </div>
            <!-- page-genre-cards -->

            <div class="page-artist-cards">
                <div class="page-main-info">
                    <h4 class="page-text">Исполнители</h4>
                    <a href="<?php echo get_url('artists'); ?>" class="show-more">Показать ещё</a>
                </div>
                <div class="genre-cards">
                    <?php if ($artists) { ?>
                        <?php $i = 0;
                        foreach ($artists as $artist) { ?>
                            <a class="genre-card" href="<?php echo get_url('artist?id=' . $artist['id']); ?>">
                                <div class="avatar-card">
                                    <img class="avatar" width="130" height="130" src="<?php echo $artist['avatar'] ?>" alt="Аватар">
                                </div>
                                <div class="card-about">
                                    <span class="genre-card-name"><?php echo $artist['nickname'] ?></span>
                                </div>
                            </a>
                        <?php $i++;
                            if ($i == 5) break;
                        }  ?>
                    <?php } else {
                        echo "Похоже что-то отломалось, увы :(";
                    } ?>
                </div>

            </div>
        </div>
        <!-- page-artist-cards -->

    </div>
    <!-- page-main-cards -->

    </div>
    </main>
    </div>