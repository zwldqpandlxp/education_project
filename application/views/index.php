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
        <?php if($flag){?>
            <h3 style="color: red;">你有未完成的作业，请尽快完成</h3>
        <?php }?>
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
                <h2>近期考试</h2>
            </div>
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <?php foreach($exam as $value){?>
                    <li class="am-g am-list-item-desced">
                        <a href="student/do_exam?id=<?php echo $value->exam_Id?>" class="am-list-item-hd "><?php echo $value->exam_Name?></a>
                        <div class="am-list-item-text">截止时间：<?php echo $value->exam_Time?></div>
                    </li>
                    <?php }?>
                </ul>
            </div>

        </div>
        <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
            <!--列表标题-->
            <div class="am-list-news-hd am-cf">
                <!--带更多链接-->
                <h2>近期作业</h2>
            </div>
            <div class="am-list-news-bd">
                <ul class="am-list">
                    <?php foreach($homework as $value){?>
                        <li class="am-g am-list-item-desced">
                            <a href="student/do_homework?id=<?php echo $value->home_Id?>" class="am-list-item-hd "><?php echo $value->home_Name?></a>
                            <div class="am-list-item-text"><?php echo $value->home_Content?></div>
                        </li>
                    <?php }?>
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
