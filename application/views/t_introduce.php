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
    <?php include "t_nav.php"?>
    <div class="tpl-content-wrapper">
        <form id="frm_reg" action="teacher/dot_itro" method="POST" style="float:left; width:620px;">
           <table cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <th>姓名：</th>
                    <td><input name="username" id="username" maxlength="20" class="TEXT" style="width: 150px;"
                               type="text">
                        <span id="name_msg">请使用真实姓名</span>
                    </td>
                </tr>
                <tr>
                    <th>级别：</th>
                    <td><input name="jibie" id="username" maxlength="20" class="TEXT" style="width: 150px;"
                               type="text">
                    </td>
                </tr>
                <tr id="tr_email">
                    <th nowrap="nowrap">电子邮箱：</th>
                    <td>
                        <input name="email" id="email" class="TEXT" style="width: 200px;" type="text">
                        <span id="bbb" ></span>
                    </td>
                </tr>
                <tr id="mor">
                    <th>学院</th>
                    <td>
                        <input name="mor" id="mor" class="TEXT" style="width: 200px;" type="text">
                    </td>
                </tr>
                <tr id="tr_gender">
                    <th>性别：</th>
                    <td>
                        <input name="gender" value="1" id="gender_1" type="radio"><label for="gender_1">男</label>&nbsp;&nbsp;&nbsp;
                        <input name="gender" value="2" id="gender_2" type="radio"><label for="gender_2">女</label>
                        <span class="gender_msg">请选择性别</span>
                    </td>
                </tr>
                <tr class="buttons">
                    <th>&nbsp;</th>
                    <td style="padding: 20px 0pt;">
                        <input value=" 提交 " class="BUTTON SUBMIT" type="submit">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>

</html>