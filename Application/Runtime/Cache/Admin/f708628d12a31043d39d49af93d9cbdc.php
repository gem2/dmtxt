<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台登录</title>

<link rel="stylesheet" href="/dmt/Public/Css/login.css"> 

</head>
<body>
<div id="login">
    <div class="warp">
        <div class="content">
            <h1></h1>
            <form action="" method="post" name="login_main" id="login_main" ">
                <div class="item"><div class="input"><div class="icon" title="用户名"></div><input value="" tabindex="1" id="admin_name" type="text" name="admin_name" /></div><label>用户名：</label></div>
                <div class="item"><div class="input"><div class="icon2" title="密码"></div><input value="" tabindex="2" id="admin_password" type="password" name="admin_password" /></div><label>密码：</label></div>
                <input type="button" value="" class="submit" />
            </form>
            <p class="copyright">Copyright ©2014-2016 GoCMS版权所有</p>
        </div>   
    </div>
</div>

<script  type="text/javascript"  src="/dmt/Public/Js/jquery-1.8.3.min.js"></script>

<script type='text/javascript'>
$(function(){
  $('.submit').click(function(){
    var admin_name=$("#admin_name").val();
    var admin_password=$("#admin_password").val();
    if(admin_password==""||admin_name==""){
        alert('登录名与密码不能为空 ');
        $("#admin_name").focus();
        return false;
    }else{
        var url = "<?php echo U('admin/login/check');?>";
        $.post(url, { admin_name:admin_name, admin_password:admin_password}, function(msg){
        if(msg.info == 'ok') {
          alert('登录成功，正在转向后台主页！');
          window.location.href = msg.callback;
        } else {
          alert(msg.info);
        }
      }, 'json').error(function(){
        alert("网络连接错误，请稍后再试");
      });

    }
  })

});
</script>
</body>
</html>