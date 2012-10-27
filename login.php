<?PHP
include './bx-config.php';
include './func.php';

if ($_GET['logout']=="1")
{
	session_start();
	session_destroy();
	$loginstatus=0;
	echo '<script language="javascript">window.history.go(-1);</script>';
	exit();
}
if (session_start()&&$_SESSION['user']<>"")//session已记录时标记登录状态
{
	$loginstatus=2;
	echo '<script language="javascript">window.location.href="/"</script>';
	exit();
}
if ($_POST["username"]<>""&&$_POST["pw"]<>"")//POST接收数据验证
	{
	$postlogin=user_login($_POST["username"],$_POST["pw"]);
		if ($postlogin['status']==true)
		{
			session_start();
			$_SESSION['user']=$postlogin['user'];
			$_SESSION['admin']=$postlogin['admin'];
			$loginstatus=1;
		}
		elseif ($postlogin['status']==false)
		{$loginstatus=-1;}
			
	}
if ($loginstatus==1)
{
	echo "<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'/\'\", 3000); </script>"; 
}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
	<link href="/bx-file/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?PHP
include (theme."head.php");
?>
<div class="reger loginer">
<?php

if ($loginstatus<1)
{//非登录状态
?>
		<h1 style="text-align:center;">登录</h1>
<?php
if ($loginstatus==-1)
{
echo "<h3 class=\"regtext\">用户名或密码错误，请重试！","</h3>";
}
?>
        <form action="login.php" method="post">
        <label for="loginuser">用户名<br /><input name="username" type="text" size="20" maxlength="15" id="loginuser"></label><br />
        <label for="loginpw">密码<br /><input name="pw" type="password" size="20" maxlength="15" id="loginpw"></label><br />
        <input name="submit" type="submit" value="登录">
		<a href="/reg.php" class="reglink">注册</a>
        </form>
		
<?PHP
}
elseif ($loginstatus==1)
{//登陆后欢迎语
echo '<h3>欢迎你！',$_SESSION['user'],'</h3>';
echo '3秒后跳转至','<a href="/">首页</a>';
}
?>
</div>
<?PHP
include (theme."footer.php");
?>
</body>
</html>