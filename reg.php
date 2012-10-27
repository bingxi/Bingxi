<?PHP
require './bx-config.php';
require './func.php';
if (session_start()&&$_SESSION['user']<>"")
{
	echo '<script language="javascript">window.location.href="/"</script>';
	exit();
}

if ($_POST["username"]<>""&&$_POST["pw"]<>""&&$_POST["pw2"]<>""&&$_POST["mail"]<>"")
{
	$regback=user_reg($_POST["username"],$_POST["pw"],$_POST["pw2"],$_POST["mail"],1);
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>注册</title>
    <!--<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
	<link href="/bx-file/css/style.css" rel="stylesheet" type="text/css">   
</head>

<body>
<?PHP
include (theme."head.php");//头部
?>
<div class="reger">
    	<h1 style="text-align:center;">注册</h1>
		<h3 class="regtext"><?PHP echo $regback;?></h3>
        <form action="reg.php" method="post">
        <label for="username">昵称<br /><input name="username" id="username" type="text" size="20" maxlength="20"></label><br />
		<label for="mail">邮箱<br /><input name="mail" id="mail" type="text" size="30"></label><br />
        <label for="pw">密码<br /><input name="pw" id="pw" type="password" size="20" maxlength="15"></label><br />
        <label for="pw2">确认密码<br /><input name="pw2" id="pw2" type="password" size="20" maxlength="15"></label><br />
        <input name="submit" type="submit" class="btn" value="注册">
        </form>
</div>
<?php
include (theme."footer.php");
?>
</body>
</html>