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
            <form class="am-form">
                <fieldset>
                    <div class="am-form-group">
                        <input type="text" class="" id="doc-ipt-email-1" placeholder="输入用户账号">
                        <span id="name" ></span>
                    </div>
                    <div >
                        <input type="password" class=""  placeholder="输入个密码吧">
                    </div>
                    <div class="am-form-group">
                        <input type="password" class="" id="doc-ipt-pwd-1" placeholder="再输一遍密码">
                    </div>
                    <p>
                        <button type="submit" class="am-btn am-btn-default">提交</button>
                    </p>
                    <p>
                        <button type="submit" class="am-btn am-btn-default">重置</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/jquery-1.9.1.min.js"></script>
<script>
    $(function(){
        var index=true;
        $('#doc-ipt-email-1').on('focusout', function (e,prem) {
            var reg = /[0-9+]/;
            if(this.value.length!=10){
//                $('#name').html('账号不为10位！');
                alert('账号不为10位！');
                index=false;
                prem && (prem.bsubmit=false);
            }else if(!reg.test(this.value)){
                alert('账号应该全为数字！');
                index=false;
            }else{
                index=true;
            }
        });
        $('#doc-ipt-email-1').on('blur', function () {
            $.get('welcome/check_name', {
                uname: this.value
            }, function (data) {
                if ($.trim(data) == 'success' && $('#doc-ipt-email-1').val() != '' && index) {
                    $('#name').html('√');
                } else if(index) {
                    $('#name').html('该用户名已被占用');
                }else {
                    $('#name').html('×');
                }
            }, 'text');
        });

    })
</script>
</body>

</html>