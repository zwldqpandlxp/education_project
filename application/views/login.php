<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>东北林业大学线上教育系统</title>
    <base href="<?php echo site_url() ?>">
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

</head>

<body data-type="login">

<div class="am-g myapp-login">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                ZN<span> 在线学习系统</span>
            </div>
        </div>
        <div class="login-font">
        </div>
        <div class="am-u-sm-10 login-am-center">
            <form class="am-form" method="post" action="welcome/check_login">
                <fieldset>
                    <div class="am-form-group">
                        <input type="text" class="" name="username" id="doc-ipt-email-1" placeholder="输入用户账号">
                    </div>
                    <div class="am-form-group">
                        <input type="password" name="password" class="" id="doc-ipt-pwd-1" placeholder="输入密码">
                    </div>
                        <button type="submit" class="am-btn am-btn-default">登录</button>
                        <a href="student/reg" style="color:#fff" class="am-btn am-btn-default">注册</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
</body>
</html>