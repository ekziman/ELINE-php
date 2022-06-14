<?php
include_once "includes/functions.php";

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
$posts = get_posts($id);
$genres = get_genres($id);

$title = 'О нас';
include_once "includes/header.php";
?>

<div class="content-container">
    <?php include_once "includes/aside.php"; ?>

    <main class="content">
        <div class="page-main-line">
            <div class="page-info">
                <h4 class="page-text">О нас</h4>
            </div>

            <div class="about_us">
                <p class="text_style_about">Молодая, но уверенная в себе площадка:)<br></p>
            </div>

            <div class="contacts">
                <h4 class="page-text">Контакты</h4>
                <ul>
                    <li>
                        <div class="contact">
                            <h3>Электронная почта:</h3>
                            <a class="link" href="mailto:elinemusic.ru@gmail.com">elinemusic.ru@gmail.com</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact">
                            <h3>Вконтакте:</h3>
                            <a class="link" href="https://vk.com/ekzimok">разработчик</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact">
                            <h3>GitHub:</h3>
                            <a class="link" href="https://github.com/ekziman">разработчик</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact">
                            <h3>Условия пользовательского соглашения</h3>
                            <a class="link" href="termsofuse">https://eline-music.ru/termsofuse</a>
                        </div>
                    </li>
                    <li>
                        <div class="contact">
                            <p>© 2022 - eline-music</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</div>