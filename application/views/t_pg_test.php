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
    <script src="assets/js/echarts.min.js"></script>
</head>
<body data-type="index">
<?php include "t_header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include"t_nav.php" ?>
    <div class="tpl-content-wrapper">
        <a href="teacher/t_change_exam" style="margin: 10px 0 15px 650px;display: block">返回-></a>
        <div id="test" style="width: 600px;margin: 30px 100px;">
            <?php foreach($results as $result){ ?>
                <p style="color: red;"><?php echo $result->home_Content?></p>
            <?php }?>
            <p><?php echo $result->dowo_Content?></p>
            <form action="teacher/get_gread_test" method="post">
                <input type="text" name="gread" placeholder="输入得分">
                <input type="hidden" value="<?php echo $stu?>" name="name">
                <input type="submit" value="提交">
            </form>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>