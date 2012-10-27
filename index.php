<?PHP
ob_start();
require './bx-config.php';
if (session_start()&&$_SESSION['user']<>"")
{
	$loginstatus=2;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页-冰曦</title>
	<!--[if lt IE 9]><script language="javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link href="/bx-file/css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>

<body>
<?PHP
include (theme."head.php");
?>
<div class="main">
	<div class="main-inner-right">
    	<div class="main-inner-right-top">
        	<?php if ($loginstatus>=1){echo '<h3 class="h3border">欢迎你，',$_SESSION['user'],' !</h3>';?>
		<ul class="daohang">
					<li><a href="/login.php?logout=1">登出</a></li>
            </ul>
<?php	}?>
        </div>
    	<div class="main-inner-right-bottom"></div>
	</div>
    <div class="main-inner-left">
    	<h3>功能</h3>
    </div>
</div>
<?PHP
include (theme."footer.php");
?>
</body>
</html>