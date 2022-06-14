<?php
include_once "pages/includes/functions.php";
$title = '404';
$error = get_error_message();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" rel="shortcut icon" href="/pages/img/fiveicon.svg">
    <link rel="stylesheet" href="/pages/css/style_404.css">
    <link rel="stylesheet" href="/pages/css/style.css">
    <title><?php echo get_page_title($title) ?></title>
</head>

<body>
    <div class="wrapper">
        <div class="block">
            <h1>404</h1>
            <h4>страница не найдена</h4>
            <p>страница, на которую вы пытаетесь попасть, не существует или была удалена</p>
            <div class="main_button">
                <a href="<?php echo get_url(""); ?>">
                    <button class="main_btn">Перейти на главную</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>