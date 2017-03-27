<?php
$loginID = $this -> session -> userdata('logindata');
?>
<!doctype html>
<html>
<head>
    <base href="<?php echo site_url() ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ZN在线教育</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/echarts.min.js"></script>
    <style>
        .tpl-content-wrapper{
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body data-type="index">
<?php include "a_heaser.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "a_nav.php"?>
    <div class="tpl-content-wrapper">
        <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
            <ul class="am-slides">
                <li>
                    <img src="assets/img/nefu1.jpg">

                </li>
                <li>
                    <img src="assets/img/nefu2.jpg">

                </li>
                <li>
                    <img src="assets/img/nefu3.jpg">

                </li>
                <li>
                    <img src="assets/img/nefu4.jpg">

                </li>
            </ul>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="js/jquery.raty.js" type="text/javascript"></script>
</body>

</html>