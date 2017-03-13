<?php $name = $this->session->userdata('logindata'); ?>
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
    <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
    <link href="assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="assets/js/star-rating.js" type="text/javascript"></script>
    <script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/echarts.min.js"></script>
</head>
<body data-type="index">
<?php include "t_header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "t_nav.php"?>
    <div class="tpl-content-wrapper">
        <a href="teacher/t_add_test"style="margin: 40px 0 15px 680px;display: block">添加作业+</a>
        <h3 style="font-size: 20px;margin: 0 0 15px 150px">作业名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开始时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            结束时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp&nbsp;操作</h3>
            <table class="table table-hover" style="width: 620px; margin: 0 150px">
                <?php foreach($results as $result){ ?>
                    <tr>
                        <th><a href=""><?php echo $result->home_Name?></a></th>
                        <th><?php echo $result->home_Start?></th>
                        <th><?php echo $result->home_End?></th>
                        <th><a href="teacher/t_see_test?course=<?php echo $result->home_Id?>">查看</a>|<a href="teacher/t_pi_test?home=<?php echo $result->home_Id?>&cour=<?php echo $result->cour_Id?>">批改</a>
                    </tr>
                <?php }?>
            </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>