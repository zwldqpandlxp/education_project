<?php $student = $this -> session -> userdata('student');?>
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
        .am-radio{
            display: inline-block;
            margin-top:5px;
        }
    </style>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "nav.php"?>
    <div class="tpl-content-wrapper">
        <?php if(!$student) {?>
            <p style="text-align: center; color: #f00;"><?php echo "请务必先完善个人信息"?></p>
        <?php }?>
        <div class="am-g">
            <div class="am-u-md-8 am-u-sm-centered">
                <form class="am-form" action="student/save_introduce" method="post">
                    <fieldset class="am-form-set">
                        <input type="text" placeholder="真实姓名" name="name" value="<?php if($student) echo $student->stud_Name?>">
                        <input type="email" placeholder="电子邮箱" name="email" value="<?php if($student) echo $student->stud_Email?>">
                        <input type="text" placeholder="专业" name="major">
                        <div class="am-radio" style="margin-right: 10px;">
                            <label>
                                <input type="radio" name="sex" value="0" checked>
                                男
                            </label>
                        </div>
                        <div class="am-radio" style="margin-top: 5px;">
                            <label>
                                <input type="radio" name="sex" value="1">
                                女
                            </label>
                        </div>
                    </fieldset>
                    <button type="submit" class="am-btn am-btn-primary am-btn-block">完善信息</button>
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