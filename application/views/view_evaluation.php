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
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "nav.php" ?>
    <div class="tpl-content-wrapper">
        <div class="a" style="width: 1000px; height:400px"></div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script>
    option = {
        title: {
            text: '我的评价情况'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: { // 坐标轴指示器，坐标轴触发有效
                type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
            }
        },
        legend: {
            data: ['教学态度', '备课情况', '作业批改情况', '与学生互动情况','言行举止'],
            align: 'right',
            right: 10
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [{
            type: 'category',
            data: ['墨渊', '夜华', '白浅', '折颜', '帝君']
        }],
        yAxis: [{
            type: 'value',
            name: '分数',
            axisLabel: {
                formatter: '{value}'
            }
        }],
        series: [{
            name: '教学态度',
            type: 'bar',
            data: [20, 12, 31, 34, 31]
        }, {
            name: '备课情况',
            type: 'bar',
            data: [10, 20, 5, 9, 3]
        }, {
            name: '作业批改情况',
            type: 'bar',
            data: [1, 1, 2, 3, 1]
        }, {
            name: '与学生互动情况',
            type: 'bar',
            data: [0.1, 2, 3, 1, 0.5]
        }, {
            name: '言行举止',
            type: 'bar',
            data: [0.1, 2, 3, 1, 0.5]
        }]
    };
    var $e=$('.a');
    function b(){
        $e.each(function(index,elem){
            var a = echarts.init(elem);
            a.setOption(option);
        })
    }
    window.onload=b;
</script>
</body>

</html>








