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
    <form action="/login/login_check" id="login_form">
        <input class="fright" type="text" name="name" id="">
        <input class="fright" type="password" name="password" id="">
        <input class="fleft vcode" type="text" name="vcode" id="">
        <img class="fleft" src="/login/vcode" onclick="changvcode(this)" title="点击切换验证码">
        <div class="clearboth"></div>
        <a class="buttom fright" id="login" href="javascript:void(0)">登录</a>
    </form>
    </div>
<script type="text/javascript">
    function changvcode(e){
        $(e).attr("src","/login/vcode?t="+Math.random());
    };
    $('#login').click(function(){
        var form = $('#login_form');
        $.post(
            form.attr('action'),
            form.serialize(),
            function(data){
                if(data.status==0){
                    alert(data.msg);
                }else{
                    window.location.href="/staff";
                }
            },
            'json'
        );
    });
</script>
</body>
</html>

