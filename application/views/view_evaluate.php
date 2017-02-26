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
    <div class="tpl-left-nav tpl-left-nav-hover">
        <div class="tpl-left-nav-title">
            Amaze UI 列表
        </div>
        <div class="tpl-left-nav-list">
            <ul class="tpl-left-nav-menu">
                <li class="tpl-left-nav-item">
                    <a href="student/index" class="nav-link subnav">
                        <i class="am-icon-home"></i>
                        <span>首页</span>
                    </a>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="student/lesson" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-bar-chart"></i>
                        <span>我的课程</span>
                        <i class="tpl-left-nav-content tpl-badge-danger">
                            12
                        </i>
                    </a>
                </li>

                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-table"></i>
                        <span>选课中心</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="table-font-list.html" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>猜你喜欢</span>
                                <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            </a>
                            <a href="table-images-list.html" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>选课中心</span>
                                <i class="tpl-left-nav-content tpl-badge-success">
                                    18
                                </i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="javascript:;" class="nav-link tpl-left-nav-link-list subnav" id="location" >
                        <i class="am-icon-wpforms"></i>
                        <span>教师评价</span>
                        <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                    </a>
                    <ul class="tpl-left-nav-sub-menu">
                        <li>
                            <a href="student/evaluate" class="subnav">
                                <i class="am-icon-angle-right"></i>
                                <span>开始评价</span>
                                <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                            </a>
                            <a href="student/view_evaluate" class="subnav active">
                                <i class="am-icon-angle-right"></i>
                                <span>查看评价</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="tpl-left-nav-item">
                    <a href="student/introduce" class="nav-link tpl-left-nav-link-list subnav">
                        <i class="am-icon-key"></i>
                        <span>完善信息</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
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
    $(window).load(function () {
        b();
        $('#location').trigger('click');
    });
</script>
</body>
</html>








