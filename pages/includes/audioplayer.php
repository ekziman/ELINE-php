<?php
include_once "functions.php";
?>
<?php if (logged_in()) { ?>
    <div class="audioplayer">
        <div class="container">
            <div class="player">
                <div class="master_play">
                    <div class="wave">
                        <div class="wave1"></div>
                        <div class="wave1"></div>
                        <div class="wave1"></div>
                    </div>
                    <img src="/pages/img/poster/Undefined.jpg" alt="poster" id="poster_master_play">
                    <h5 id="title">Undefined<br>
                        <div class="subtitle">Undefined</div>
                    </h5>
                    <div class="icon">
                        <i class="bi bi-skip-start-fill" id="back"></i>
                        <i class="bi bi-play-fill" id="masterPlay"></i>
                        <i class="bi bi-skip-end-fill" id="next"></i>
                    </div>
                    <div class="info-bar">
                        <span id="currentStart">0:00</span>
                        <div class="bar">
                            <input type="range" id="seek" min="0" value="0" max="100">
                            <div class="bar2" id="bar2"></div>
                            <div class="dot"></div>
                        </div>
                        <span id="currentEnd">0:00</span>
                    </div>
                    <div class="vol">
                        <i class="bi bi-volume-up" id="vol_icon"></i>
                        <input type="range" id="vol" min="0" value="30" max="100">
                        <div class="vol_bar"></div>
                        <div class="dot" id="vol_dot"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
} ?>

<script src="<?php echo get_url('/pages/app.php'); ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo get_url('/pages/js/toTop.js'); ?>"></script>
<div ID="toTop">
    <img width="35" height="35" src="/pages/img/toTop.svg" alt="Наверх">
</div>

</body>

</html>