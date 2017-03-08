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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/echarts.min.js"></script>
</head>
<body data-type="index">
<div class="tpl-page-container tpl-page-header-fixed">
    <div style="width: 90%; margin: 10px auto;">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>评价项</th>
                <th>线上教学系统教师评价</th>
            </tr>
            </thead>
            <tbody>
            <tr class="info">
                <th>课堂质量：</th>
                <th>
                    <div>
                        <div id="star1"></div>
                        <div id="result1"></div>
                        <span id="jg1"></span>
                    </div>
                </th>
            </tr>
            <tr>
                <th>教学任务完成情况：</th>
                <th>
                    <div>
                        <div id="star2"></div>
                        <div id="result2"></div>
                        <span id="jg2"></span>
                    </div>
                </th>
            </tr>
            <tr>
                <th>回答问题：</th>
                <th>
                    <div>
                        <div id="star3"></div>
                        <div id="result3"></div>
                        <span id="jg3"></span>
                    </div>
                </th>
            </tr>

            <tr class="info">
                <th>教学态度：</th>
                <th>
                    <div>
                        <div id="star4"></div>
                        <div id="result4"></div>
                        <span id="jg4"></span>
                    </div>
                </th>
            </tr>
            </tbody>
        </table>
        <a href="student/do_evaluate" class="btn btn-success" id="submit">确认提交</a>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.raty.js"></script>
<script>
    rat('star1','result1',1,'jg1');
    rat('star2','result2',1,'jg2');
    rat('star3','result3',1,'jg3');
    rat('star4','result4',1,'jg4');
    function rat(star,result,m,jg){

        star= '#' + star;
        result= '#' + result;
        jg='#'+jg;
        $(result).hide();//将结果DIV隐藏

        $(star).raty({
            hints: ['10','20', '30', '40', '50','60', '70', '80', '90', '100'],
            path: "assets/img",
            starOff: 'star-off-big.png',
            starOn: 'star-on-big.png',
            size: 24,
            start: 40,
            showHalf: true,
            target: result,
            targetKeep : true,//targetKeep 属性设置为true，用户的选择值才会被保持在目标DIV中，否则只是鼠标悬停时有值，而鼠标离开后这个值就会消失
            click: function (score, evt) {
//			alert('你的评分是'+score*m+'分');
                $(jg).html(score*m);
            }
        });
    }
    $submit = $('#submit');
    var localurl = window.location.href;
    var arr = localurl.split('?')[1].split('=');
    $submit.on('click', function () {
        var str_jg1 = $('#jg1').html();
        var str_jg2 = $('#jg2').html();
        var str_jg3 = $('#jg3').html();
        var str_jg4 = $('#jg4').html();
        var url = "student/do_evaluate?" + arr[0] + "=" + arr[1] + "&lesson=" + str_jg1 +
            "&task=" + str_jg2 + "&answer=" + str_jg3 + "&behaviour=" + str_jg4;
        $submit.attr('href', url);
    })
</script>
</body>
</html>
