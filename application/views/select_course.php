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
        .tpl-content-wrapper{
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body data-type="index">
<?php include "header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "nav.php"?>
    <div class="tpl-content-wrapper">
        <table class="am-table am-table-bordered am-table-radius am-table-striped">
           <thead>
                <tr>
                    <th>课程名称</th>
                    <th>任课教师</th>
                    <th>课程学分</th>
                    <th>课程课时</th>
                    <th>选课</th>
                </tr>
           </thead>
            <tbody>
                <?php foreach($course as $value){?>
                <tr>
                    <td><?php echo $value->cour_Name?></td>
                    <td><?php echo $value->teac_Name?></td>
                    <td><?php echo $value->cour_Credit?></td>
                    <td><?php echo $value->cour_Class?></td>
                    <td>
                    <?php if(isset($res[$value -> cour_Id])){ ?>
                        <a href="student/del_select?id=<?php echo $res[$value -> cour_Id] -> seco_Id?>"><?php echo "退选"?></a>
                    <?php }else{?>
                        <a href="student/do_select?id=<?php echo $value -> teco_Id?>"><?php echo "选课"?></a>
                    <?php }?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
<script src="js/jquery.raty.js" type="text/javascript"></script>
</body>

</html>