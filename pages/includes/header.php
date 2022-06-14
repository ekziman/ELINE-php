<?php 
include_once "functions.php"; 

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
$posts = get_posts($id)
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_page_title($title) ?></title>
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="ELINE" />
    <meta property="og:title" content="<?php echo get_page_title($title) ?>" />
    <meta property="og:description" content="Слушай музыку у нас!" />
    <meta property="og:image" content="/pages/img/logo.png" />

    <link type="image/x-icon" rel="shortcut icon" href="/pages/img/fiveicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_url('/pages/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_url('/pages/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo get_url('/pages/css/toTop.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_url('/pages/css/account.css'); ?>">
    <script src="<?php echo get_url('/pages/js/script.js'); ?>"></script>
</head>

<body>
    <header class="header contant-container">
        <a href="<?php echo get_url(); ?>" class="header-logo">
            <div class="logo">
                <svg width="121" height="46" viewBox="0 0 121 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.56 36C5.78667 36 4.41 35.5333 3.43 34.6C2.45 33.6667 1.96 32.36 1.96 30.68V16.68C1.96 15.0467 2.42667 13.775 3.36 12.865C4.31667 11.955 5.635 11.5 7.315 11.5H18.2C18.9 11.5 19.4367 11.6633 19.81 11.99C20.1833 12.2933 20.37 12.7367 20.37 13.32C20.37 13.88 20.1717 14.3233 19.775 14.65C19.4017 14.9533 18.8767 15.105 18.2 15.105H8.12C7.65333 15.105 7.28 15.2567 7 15.56C6.74333 15.8633 6.615 16.2833 6.615 16.82V21.685H15.54C16.24 21.685 16.7767 21.8483 17.15 22.175C17.5233 22.4783 17.71 22.9217 17.71 23.505C17.71 24.065 17.5117 24.5083 17.115 24.835C16.7417 25.1383 16.2167 25.29 15.54 25.29H6.615V30.68C6.615 31.2167 6.74333 31.6367 7 31.94C7.28 32.2433 7.65333 32.395 8.12 32.395H18.97C19.67 32.395 20.2067 32.5583 20.58 32.885C20.9533 33.1883 21.14 33.6317 21.14 34.215C21.14 34.775 20.9417 35.2183 20.545 35.545C20.1717 35.8483 19.6467 36 18.97 36H7.56ZM34.3487 36C32.5753 36 31.1987 35.5333 30.2187 34.6C29.2387 33.6667 28.7487 32.36 28.7487 30.68V13.25C28.7487 12.5967 28.9587 12.0833 29.3787 11.71C29.7987 11.3367 30.3587 11.15 31.0587 11.15C31.7587 11.15 32.3187 11.3483 32.7387 11.745C33.182 12.1183 33.4037 12.62 33.4037 13.25V30.68C33.4037 31.2167 33.532 31.6367 33.7887 31.94C34.0687 32.2433 34.442 32.395 34.9087 32.395H46.1087C46.8087 32.395 47.3453 32.5583 47.7187 32.885C48.092 33.1883 48.2787 33.6317 48.2787 34.215C48.2787 34.775 48.0803 35.2183 47.6837 35.545C47.3103 35.8483 46.7853 36 46.1087 36H34.3487ZM58.5214 36.35C57.8214 36.35 57.2614 36.1633 56.8414 35.79C56.4214 35.4167 56.2114 34.9033 56.2114 34.25V13.25C56.2114 12.5967 56.4214 12.0833 56.8414 11.71C57.2614 11.3367 57.8214 11.15 58.5214 11.15C59.198 11.15 59.758 11.3367 60.2014 11.71C60.6447 12.0833 60.8664 12.5967 60.8664 13.25V34.25C60.8664 34.9033 60.6447 35.4167 60.2014 35.79C59.758 36.1633 59.198 36.35 58.5214 36.35ZM71.9854 36.35C71.2854 36.35 70.7254 36.1633 70.3054 35.79C69.8854 35.4167 69.6754 34.9033 69.6754 34.25V21.055C69.6754 17.9517 70.6438 15.525 72.5804 13.775C74.5171 12.025 77.2004 11.15 80.6304 11.15C84.0604 11.15 86.7438 12.025 88.6804 13.775C90.6171 15.525 91.5854 17.9517 91.5854 21.055V34.25C91.5854 34.9033 91.3754 35.4167 90.9554 35.79C90.5354 36.1633 89.9754 36.35 89.2754 36.35C88.5754 36.35 88.0038 36.1633 87.5604 35.79C87.1404 35.3933 86.9304 34.88 86.9304 34.25V20.95C86.9304 18.9667 86.3938 17.45 85.3204 16.4C84.2471 15.35 82.6838 14.825 80.6304 14.825C78.5771 14.825 77.0138 15.35 75.9404 16.4C74.8671 17.45 74.3304 18.9667 74.3304 20.95V34.25C74.3304 34.88 74.1088 35.3933 73.6654 35.79C73.2454 36.1633 72.6854 36.35 71.9854 36.35ZM104.939 36C103.166 36 101.789 35.5333 100.809 34.6C99.8293 33.6667 99.3393 32.36 99.3393 30.68V16.68C99.3393 15.0467 99.806 13.775 100.739 12.865C101.696 11.955 103.014 11.5 104.694 11.5H115.579C116.279 11.5 116.816 11.6633 117.189 11.99C117.563 12.2933 117.749 12.7367 117.749 13.32C117.749 13.88 117.551 14.3233 117.154 14.65C116.781 14.9533 116.256 15.105 115.579 15.105H105.499C105.033 15.105 104.659 15.2567 104.379 15.56C104.123 15.8633 103.994 16.2833 103.994 16.82V21.685H112.919C113.619 21.685 114.156 21.8483 114.529 22.175C114.903 22.4783 115.089 22.9217 115.089 23.505C115.089 24.065 114.891 24.5083 114.494 24.835C114.121 25.1383 113.596 25.29 112.919 25.29H103.994V30.68C103.994 31.2167 104.123 31.6367 104.379 31.94C104.659 32.2433 105.033 32.395 105.499 32.395H116.349C117.049 32.395 117.586 32.5583 117.959 32.885C118.333 33.1883 118.519 33.6317 118.519 34.215C118.519 34.775 118.321 35.2183 117.924 35.545C117.551 35.8483 117.026 36 116.349 36H104.939Z" fill="#F1D7C7" />
                    <ellipse cx="70.279" cy="36.7683" rx="4.5" ry="2.8258" transform="rotate(-34.1909 70.279 36.7683)" fill="#F1D7C7" />
                    <ellipse cx="87.368" cy="36.8033" rx="4.5" ry="3" transform="rotate(-26.6909 87.368 36.8033)" fill="#F1D7C7" />
                </svg>
            </div>
        </a>

        <nav class="header-nav">
            <a href="<?php echo get_url('chart'); ?>" class="header-nav-link">Популярное</a>
            <!-- <a href="#" class="header-nav-link hidden">Новинки</a> -->
            <!-- <a href="#" class="header-nav-link hidden">Плейлисты</a> -->
            <a href="<?php echo get_url('genres'); ?>" class="header-nav-link">Жанры</a>
            <a href="<?php echo get_url('artists'); ?>" class="header-nav-link">Исполнители</a>
            <a href="<?php echo get_url('feedback'); ?>" class="header-nav-link">О нас</a>
        </nav>
        <form action="search" class="search-form" method="post" autocomplete="off">
            <input class="search-input" name="search" type="search" placeholder="Название, исполнитель" />
            <button class="search-button">
                <svg class="icon" width="20" height="20">
                    <use xlink:href="/pages/img/icons.svg#search"></use>
                </svg>
            </button>
            <div class="search_result">
                <!-- <a href="" class="card">
                    <img src="/pages/img/artist/1.jpg" alt="">
                    <div class="content-card">
                        On My Way
                        <div class="subtitle">Alan Walker</div>
                    </div>
                </a> -->
            </div>
        </form>
        <?php if (logged_in()) { ?>
            <a href="<?php echo get_url('/pages/liked'); ?>" class="liked">
                <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.33857 10.7637C-0.041108 7.65052 0.752117 2.9808 4.71824 1.42423C8.68437 -0.13234 11.064 2.9808 11.8573 4.53737C12.6505 2.9808 15.8234 -0.13234 19.7895 1.42423C23.7556 2.9808 23.7556 7.65052 21.376 10.7637C18.9963 13.8768 11.8573 20.1031 11.8573 20.1031C11.8573 20.1031 4.71824 13.8768 2.33857 10.7637Z" stroke="#3D1D9A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="nav-text-user">Избранное</span>
            </a>
        <?php } ?>
        <?php if (logged_in()) { ?>
            <div class="dropdown">
                <button class="dropbtn">
                    <img class="avatar_user" width="30" height="30" src="<?php echo $_SESSION['user']['avatar'] ?>" alt="">
                    
                    <p class="name_user"><?php echo $_SESSION['user']['name'] ?></p>
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <div class="dropdown-content">
                    <a href="<?php echo get_url('account') ?>">Аккаунт</a>
                    <!-- <a href="<?php echo get_url('support'); ?>">Тех. поддержка</a> -->
                    <a href="<?php echo get_url('/pages/includes/logout.php'); ?>">Выход</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="auth login">
                <a href="<?php echo get_url('sign'); ?>">Вход</a>
            </div>
        <?php } ?>
        <!-- /.auth -->
    </header>
    <!-- header -->