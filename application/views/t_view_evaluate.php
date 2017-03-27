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
        <div class="a" style="height:400px; margin: 30px auto;"></div>
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
            data: [<?php $sum=0?>
                <?php foreach ($res as $key => $value){?>
                <?php ++$sum?>
                <?php echo "'"?>
                <?php echo '学生'.$sum?>
                <?php echo "'"?>
                <?php if($sum < $count){?>
                <?php echo ","?>
                <?php }}?>]
        }],
        yAxis: [{
            type: 'value',
            name: '分数',
            axisLabel: {
                formatter: '{value}'
            }
        }],
        series: [{
            name: '课堂质量',
            type: 'bar',
            data: [<?php $sum=0?>
                <?php foreach ($res as $key => $value){?>
                <?php ++$sum?>
                <?php echo $value['evte_Lesson']/$value['num']?>
                <?php if($sum < $count){?>
                <?php echo ","?>
                <?php }}?>]
        }, {
            name: '教学任务完成情况',
            type: 'bar',
            data: [<?php $sum=0?>
                <?php foreach ($res as $key => $value){?>
                <?php ++$sum?>
                <?php echo $value['evte_Task']/$value['num']?>
                <?php if($sum < $count){?>
                <?php echo ","?>
                <?php }}?>]
        }, {
            name: '回答问题',
            type: 'bar',
            data: [<?php $sum=0?>
                <?php foreach ($res as $key => $value){?>
                <?php ++$sum?>
                <?php echo $value['evte_Answer']/$value['num']?>
                <?php if($sum < $count){?>
                <?php echo ","?>
                <?php }}?>]
        }, {
            name: '教学态度',
            type: 'bar',
            data: [<?php $sum=0?>
                <?php foreach ($res as $key => $value){?>
                <?php ++$sum?>
                <?php echo $value['evte_Behaviour']/$value['num']?>
                <?php if($sum < $count){?>
                <?php echo ","?>
                <?php }}?>]
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








