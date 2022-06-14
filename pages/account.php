<?php
include_once "includes/functions.php";

$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
$data = $_POST;

function loadAvatar($avatar)
{
    $user_id = $_SESSION['user']['id'];
    $type = $avatar['type'];
    $name = md5(microtime()) . '.' . substr($type, strlen("image/"));
    $dir = 'pages/img/uploads/usersAvatar/';
    $uploadfile = $dir . $name;

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile)) {
        return db_query("UPDATE `users` SET `avatar` = '$uploadfile' WHERE `users`.`id` = $user_id;");
        die;
    } else {
        return false;
    }
    return true;
}
if (isset($data['set_avatar'])) {
    $avatar = $_FILES['avatar'];

    if (avatarSecurity($avatar)) loadAvatar($avatar);
    redirect(get_url('account'));
    die;
}

$profile_user = get_user_profile();
$error = get_error_message();

$successfully = get_successfully_message();

$title = 'Мой аккаунт';
include_once "includes/header.php"; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<div class="content-container">
    <aside class="aside">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Profile')" id="defaultOpen">Профиль</button>
            <button class="tablinks" onclick="openCity(event, 'termsofuse')">Использование сервиса</button>
            <button class="tablinks" onclick="openCity(event, 'copyright')">Обладатели авторских прав</button>
        </div>
    </aside>

    <div class="content-account">
        <div id="Profile" class="tabcontent">
            <h3 class="title">Профиль</h3>
            <div class="info">
                <div class="image_user">
                    <div class="my_image">
                        <img src="<?php echo $profile_user[0]['avatar'] ?>" alt="Аватар">
                    </div>
                    <form class="avatar_profile" action="<?php echo get_url('account'); ?>" enctype="multipart/form-data" method="POST">
                        <div class="example-2">
                            <div class="form-group">
                                <input type="file" name="avatar" id="file" class="input-file">
                                <label for="file" class="btn btn-tertiary js-labelFile">
                                    <i class="icon fa fa-check"></i>
                                    <span>Выбрать файл</span>
                                </label>
                                <button type="submit" name='set_avatar' class="btn_center" title="Обновить">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <form class="profile" action="<?php echo get_url('/pages/includes/update_user.php'); ?>" method="post">
                    <table>
                        <tr>
                            <td>
                                <p><label for="">Логин:</label></p>
                            </td>
                            <td><input class="input" placeholder="<?php echo $profile_user[0]['login'] ?>" name="login" required></td>
                        </tr>
                        <tr>
                            <td>
                                <p><label for="">Имя:</label></p>
                            </td>
                            <td><input class="input" type="name" placeholder="<?php echo $profile_user[0]['name'] ?> " name="name" required></td>
                        </tr>
                        <tr>
                            <td>
                                <p><label for="">Новый пароль:</label></p>
                            </td>
                            <td><input class="input" type="password" placeholder="Пароль" name="pass_new" required></td>
                        </tr>
                        <tr>
                            <td>
                                <p><label for="">Повторите пароль:</label></p>
                            </td>
                            <td><input class="input" type="password" placeholder="Пароль повторно" name="pass_new2" required></td>
                        </tr>
                    </table>
                    <div class="account_form">
                        <button class="btn_center" type="submit">Сохранить</button>
                    </div>
                    <?php if ($error) { ?>
                        <div class="profile-form__error"><?php echo $error; ?></div>
                    <?php } ?>
                    <?php if ($successfully) { ?>
                        <div class="profile-form__successfully"><?php echo $successfully; ?></div>
                    <?php } ?>
                </form>
            </div>
        </div>

        <div id="termsofuse" class="tabcontent">
            <h3 class="title">Условия использования сервиса eline-music.ru</h3>
            <h4 class="title">1. Общие положения</h4>
            <div class="conbody">
                <p class="p">1.1. «eline-music.ru» (далее — «eline-music») предлагает пользователю сети Интернет (далее — Пользователь) — использовать сервис eline-music, доступный по адресу:  <a class="link" href="http://eline-music.ru">http://eline-music.ru</a> (далее — «Сервис»).</p>
                <p class="p">1.2. Начиная использовать Сервис/его отдельные функции, Пользователь считается принявшим настоящие Условия, а также условия Регулирующих документов, в полном объеме, без всяких оговорок и исключений. В случае несогласия Пользователя с какими-либо из положений указанных документов, Пользователь не вправе использовать Сервис.</p>
                <p class="p">1.3. Настоящие Условия могут быть изменены eline-music без какого-либо специального уведомления, новая редакция Условий вступает в силу с момента ее размещения в сети Интернет по указанному в настоящем абзаце адресу, если иное не предусмотрено новой редакцией Условий. Действующая редакция Условий всегда находится на странице по адресу: <a class="link" href="termsofuse">https://eline-music.ru/termsofuse</a>.</p>
                <p class="p">1.4. В случае если eline-music были внесены какие-либо изменения в настоящие Условия, в порядке, предусмотренном п. 1.3. настоящих Условий, с которыми Пользователь не согласен, он обязан прекратить использование Сервиса.</p>
                <p class="p">1.5. Сервис предлагает Пользователю возможность бесплатного поиска и прослушивания музыкальных композиций (фонограмм) при помощи своего персонального компьютера, а также возможность использования Сервиса иными способами, не противоречащими положениям настоящих Условий. Все существующие на данный момент функции Сервиса, а также любое развитие их и/или добавление новых является предметом настоящих Условий.</p>
            </div>
        </div>

        <div id="copyright" class="tabcontent">
            <h3 class="title">Обладатели авторских и смежных прав</h3>
            <div class="conbody">
                <p class="p">Все композиции, представленные на eline-music, легальны. Они доступны конечному пользователю бесплатно и без ограничений.</p>
                <p class="p">Имя (творческий псевдоним) исполнителя или наименование группы исполнителей, а также название композиции отображаются непосредственно при прослушивании композиции. Информация об обладателях авторских и смежных прав на композиции в коллекции сервиса приведена ниже:</p>
                <p class="p author">OG LOC GANG BEATS</p>
                <p class="p author">Lavrov Prod</p>
                <p class="p author">Durasel</p>
                <p class="p author">EKZI BEATS</p>
                <p class="p author">eline-music</p>
            </div>
            <p class="p">© 2022 - eline-music</p>
        </div>
    </div>

    <script>document.getElementById("defaultOpen").click();</script>
    <script src="<?php echo get_url('/pages/app.php'); ?>"></script>