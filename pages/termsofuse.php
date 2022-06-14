<?php
include_once "includes/functions.php";


$title = 'Условия использования сервиса';
include_once "includes/header.php"; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<div class="content-container">
    <aside class="aside">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'termsofuse')" id="defaultOpen">Использование сервиса</button>
            <button class="tablinks" onclick="openCity(event, 'copyright')">Обладатели авторских прав</button>
        </div>
    </aside>

    <div class="content-account">
       
        <div id="termsofuse" class="tabcontent">
            <h3 class="title">Условия использования сервиса eline-music.ru</h3>
            <h4 class="title">1. Общие положения</h4>
            <div class="conbody">
                <p class="p">1.1. «eline-music.ru» (далее — «eline-music») предлагает пользователю сети Интернет (далее — Пользователь) — использовать сервис eline-music, доступный по адресу: <a class="link" href="http://eline-music.ru">http://eline-music.ru</a> (далее — «Сервис»).</p>
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