<?php
include_once "includes/functions.php";
$title = 'Плэйлисты';
$genres = get_genres($id);
include_once "includes/header.php"; ?>
<div class="content-container">
    <?php include_once "includes/aside.php"; ?>
    <!-- aside -->

    <main class="content">
        <div class="page-main-line">
            <div class="page-main-cards"></div>
            <div class="page-playlist-cards">
                <div class="page-main-info">
                    <a href="javascript:history.back()">
                        <button class="back-button">
                            <img src="img/back.svg" alt="Назад">
                        </button>
                    </a>
                    <h4 class="page-text">Плейлисты</h4>
                </div>
                <div class="playlist-cards">
                    <a href="#">
                        <div class="playlist-card">
                            <div class="playlist-avatar">
                                <img width="70" height="70" src="img/playlist/love.svg" alt="Аватар">
                            </div>
                            <div class="playlist-about">
                                <span class="playlist-card-name">Романтика</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="playlist-card playlist-card-color">
                            <div class="playlist-avatar">
                                <img width="70" height="70" src="img/playlist/sport.svg" alt="Аватар">
                            </div>
                            <div class="playlist-about">
                                <span class="playlist-card-name">Спорт</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="playlist-card">
                            <div class="playlist-avatar">
                                <img width="70" height="70" src="img/playlist/morning.svg" alt="Аватар">
                            </div>
                            <div class="playlist-about">
                                <span class="playlist-card-name">Доброе утро</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="playlist-card playlist-card-color">
                            <div class="playlist-avatar">
                                <img width="70" height="70" src="img/playlist/feast.svg" alt="Аватар">
                            </div>
                            <div class="playlist-about">
                                <span class="playlist-card-name">Праздник</span>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="playlist-card">
                            <div class="playlist-avatar">
                                <img width="70" height="70" src="img/playlist/classic.svg" alt="Аватар">
                            </div>
                            <div class="playlist-about">
                                <span class="playlist-card-name">Классика</span>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <!-- page-playlist-cards -->
        </div>
        <!-- page-main-cards -->
</div>
</main>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/toTop.js"></script>
<div ID="toTop">
    <img width="35" height="35" src="img/toTop.svg" alt="Наверх">
</div>
</body>

</html>