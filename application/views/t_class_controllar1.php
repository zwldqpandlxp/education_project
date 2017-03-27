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
    <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .lesson{
            width: 25%;
            height: 330px;
            border:1px solid;
            float: left;
            margin-right:10px;
            margin-bottom:10px;
            text-align: center;
        }
        .lesson img{
            margin:0 5%;
            height: 250px;
            width: 90%;
        }
        .class_con{
            background: #eee;
            border: 1px inset;
        }
    </style>
</head>
<body data-type="index">
<?php include "t_header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "t_nav.php"?>
    <div class="tpl-content-wrapper">
        <div class="lesson-container" style="width: 80%; margin: 0 auto">
            <ul class="am-nav am-nav-pills am-nav-justify" style="height: 60px;">
                <li class="am-active"><a href="javascript:;">已有课程</a></li>
            </ul>
            <div class="lesson-content">
                <h3>提交成功!</h3>
                <form action="teacher/t_gread" method="post">
                    <table class="table table-striped" style="width: 100%;margin: 0 auto">
                        <tr>
                            <th>课程</th>
                            <th>描述</th>
                            <th>平时</th>
                            <th>作业</th>
                            <th>期末</th>
                            <th><input type="text" style="width:50px;" class="class_con"></th>
                            <th><input type="text" style="width:50px;" class="class_con"></th>
                            <th><input type="text" style="width:50px;" class="class_con"></th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <th><input type="text" style="width:150px;" name="class" class="class_con"></th>
                            <th><input type="text" style="width:300px;" name="ms" class="class_con"></th>
                            <th><input type="text" style="width:50px;" name="ps" class="class_con"></th>
                            <th><input type="text" style="width:50px;" name="zy" class="class_con"></th>
                            <th><input type="text" style="width:50px;" name="qm" class="class_con"></th>
                            <th><input type="text" style="width:50px;" class="class_con"></th>
                            <th><input type="text" style="width:50px;" class="class_con"></th>
                            <th><input type="text" style="width:50px;" class="class_con"></th>
                            <th><input type="submit"value="提交"></th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>