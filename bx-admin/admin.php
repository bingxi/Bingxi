<?PHP
require '../bx-config.php';
if(session_start()&&$_SESSION['admin']==1&&$_SESSION['user']==ADMIN)
{	
}
else
{	
	header('HTTP/1.1 404 Not Found');
	exit();
}

?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>冰曦 -- 后台管理</title>
	<link rel="stylesheet" href="/bx-file/css/admin.css" />
	<link rel="stylesheet" href="/bx-file/css/style.css" />
    <script src="http://a.tbcdn.cn/s/kissy/1.2.0/kissy-min.js"></script>
</head>
<body>
	<?PHP
	include ('../'.theme.'head.php');
	?>
	<div class="main">
		<div class="main-inner-right">
            <ul class="adminmenu" id="adminmenu">
                <li><a href="admina.php" target="iframeview">主页</a></li>
                <li><a href="admina.php?action=2" target="iframeview">用户管理</a></li>
                <li><a href="admina.php" target="iframeview">即将开始</a></li>
                <li><a href="admina.php" target="iframeview">还在规划中尚未确定</a></li>
                <li><a href="admina.php" target="iframeview">私人空间</a></li>
                <li><a href="admina.php" target="iframeview">垃圾回收站</a></li>
                <li><a href="admina.php" target="iframeview">全部任务</a></li>
                <li><a href="admina.php" target="iframeview">已完成</a></li>
                <li><a href="admina.php" target="iframeview">即将开始</a></li>
                <li><a href="admina.php" target="iframeview">还在规划中尚未确定</a></li>
                <li><a href="admina.php" target="iframeview">私人空间</a></li>
                <li><a href="admina.php" target="iframeview">垃圾回收站</a></li>
            </ul>
			<script>
            (function(S){
                var D = S.DOM, E = S.Event, index = -1, as = [];
            
                S.all("#adminmenu a").on("mouseover", function(){
                    var _this = this;
                    index = S.indexOf(_this, S.all("#adminmenu a"));
                    if(as[index] && as[index].isRunning(_this)){
                        as[index].stop(false);
                    }
                    D.css(_this, "background-color", "#66a7e1");
                }).on("mouseout", function(){
                    as[index] = new S.Anim(this, {"backgroundColor":"#f8f9fd"}, 0.5, "easeOut", function(){});
                    as[index].run();
                });
            })(KISSY);
            </script>
		</div>
		<div class="main-inner-left">
		<iframe src="admina.php" frameborder="0" name="iframeview" style="width:100%;height:100%" lang="zh"></iframe>
		</div>
	</div>
<?PHP
include ('../'.theme.'footer.php');
?>
</body>
</html>