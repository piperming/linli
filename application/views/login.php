<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>交通银行信用卡管理系统-后台登录</title>
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>html/css/style.css">
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>html/js/jquery-1.6.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>html/js/base.js"></script>
</head>
<body>
    <div class="login border_radius">
        <input class="fright" type="text" name="" id="">
        <input class="fright" type="password" name="" id="">
        <input class="fleft vcode" type="text" name="" id="">
        <img class="fleft" src="/login/vcode" onclick="changvcode(this)" title="点击切换验证码">
        <div class="clearboth"></div>
        <a class="buttom fright" href="">登录</a>
    </div>
<script type="text/javascript">
    function changvcode(e){
        $(e).attr("src","/login/vcode?t="+Math.random());
    }
</script>
</body>
</html>

