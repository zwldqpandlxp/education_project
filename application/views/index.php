<?php
$student = $this -> session -> userdata('student');
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
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "nav.php"?>
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
        <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
            <!--列表标题-->
            <div class="am-list-news-hd am-cf">
                <!--带更多链接-->
                <a href="###" class="">
                    <h2>近期作业</h2>
                    <span class="am-list-news-more am-fr">更多 &raquo;</span>
                </a>
            </div>

            <div class="am-list-news-bd">
                <ul class="am-list">

                    <li class="am-g am-list-item-desced">
                        <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的那些囧！</a>


                        <div class="am-list-item-text">囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！</div>

                    </li>
                    <li class="am-g am-list-item-desced">
                        <a href="http://www.douban.com/online/11624755/" class="am-list-item-hd ">我最喜欢的一张画</a>


                        <div class="am-list-item-text">你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片美我最喜欢的画群296795413进群发画，少说多发图，</div>

                    </li>
                    <li class="am-g">
                        <a href="http://www.douban.com/online/11645411/" class="am-list-item-hd ">“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！</a>



                    </li>
                </ul>
            </div>

        </div>
        <table class="am-table .am-table-bordered">
            <thead>
            <tr>
                <th>课程名称</th>
                <th>学分</th>
                <th>学时</th>
                <th>成绩</th>
            </tr>
            </thead>
            <tbody>
            <?php $Count = 0?>
            <?php foreach($courses as $course){ ++$Count?>
                <tr <?php if($Count % 2) echo 'class="am-primary"'?>>
                    <td><?php echo $course -> cour_Name?></td>
                    <td><?php echo $course -> cour_Credit?></td>
                    <td><?php echo $course -> cour_Class?></td>
                    <td><?php if(!$course -> seco_Attend) echo $course -> seco_Grade; else echo '正在修读'?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="js/jquery.raty.js" type="text/javascript"></script>
</body>

</html>