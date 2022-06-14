<?php
include_once "includes/functions.php";
$title = 'Вход';
$error = get_error_message();
$successfully = get_successfully_message();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" rel="shortcut icon" href="/pages/img/fiveicon.svg">
    <title><?php echo get_page_title($title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_url('/pages/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_url('/pages/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo get_url('/pages/css/sign.css'); ?>">
</head>

<body>
    <div class="wrapper">
        <div class="block">
            <div class="logo">
                <a href="<?php echo get_url(""); ?>">
                    <img width="230" height="76" src="/pages/img/logo-two.svg" alt="">
                </a>
            </div>
            <h2 class="eline-form__title">Вход</h2>
            <?php if ($error) { ?>
                <div class="eline-form__error"><?php echo $error; ?></div>
            <?php } ?>
            <?php if ($successfully) { ?>
                <div class="eline-form__successfully"><?php echo $successfully; ?></div>
            <?php } ?>
            <form class="eline-form" action="<?php echo get_url('/pages/includes/sign_in.php'); ?>" method="post">
                <div class="eline-form__wrapper_inputs">
                    <input type="login" class="eline-form__input" placeholder="Введите ваш логин" name="login" required>
                    <input type="password" class="eline-form__input" placeholder="Пароль" name="pass" required>
                    <div class="eline-form__input-more">
                        <input class="remember-me" type="checkbox" id="scales" name="scales">
                        <label class="remember-me" for="scales">Запомнить меня</label>
                        <a class="forgot-password" href="#">Забыли пароль?</a>
                    </div>
                </div>
                <div class="eline-form__btns_center">
                    <button class="eline-form__btn_center" type="submit">Войти</button>
                </div>
            </form>
            <div class="eline-form__subtitle">
                <span class="subtitle">У вас ещё нет аккаунта?</span>
                <a class="registration-title" href="register">Зарегистрироваться</a>
            </div>
        </div>
    </div>
</body>

</html>