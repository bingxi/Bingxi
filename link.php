<?PHP
session_start();
require ('./bx-config.php');
if (isset($_GET['linkid'])&&ereg('^[0-9a-zA-Z\_]*$',$_GET['linkid']))
{
	$connect=mysql_connect(DB_SERVE,DB_USER,DB_PW) or die("连接数据库失败");
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db(DB,$connect) or die("选取数据库失败");//选择数据表
	$sqlcommand = "SELECT `truelink`,`times` FROM ".DB.".".DB_LINKDB." WHERE urlid='".$_GET['linkid']."'";
	//echo $sqlcommand;
	$sql_back= mysql_query($sqlcommand, $connect);
	if (mysql_num_rows($sql_back)<>0)
	{
		$linkback = mysql_fetch_array($sql_back);
		header('HTTP/1.1 301 Moved Permanently');
		header('Location:'.$linkback['truelink']);
		$times=(int)$linkback['times']+1;
		mysql_query("UPDATE ".DB.".".DB_LINKDB." SET times = '".$times."' WHERE urlid='".$_GET['linkid']."'",$connect);
		mysql_close($connect);
		exit();
	}
	mysql_close($connect);
}
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>短网址 - 冰曦</title>
	<?PHP echo $Page_Head_Infor;?> 
	<script src="http://a.tbcdn.cn/s/kissy/1.2.0/kissy-min.js"></script>
</head>
<body class="shortlink">
	<div class="shortlink_tilte">
		<h1>冰曦短网址</h1>
		<?PHP	
		if (isset($_SESSION['user'])){echo "<a href=\"/login.php\">".$_SESSION['user']."</a>";}
		else {echo "<a href=\"/login.php\">登录</a>";}
		?>
	</div>
<?PHP	
if (!isset($_SESSION['user'])){
?>
	<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:28px;">
		<tbody><tr>
			<td align="center"><img src="/bx-file/img/f1.png" alt="短网址_数据实时"></td>
			<td align="center"><img src="/bx-file/img/f2.png" alt="短网址_链接安全"></td>
			<td align="center"><img src="/bx-file/img/f3.png" alt="短网址_永久免费"></td>
		</tr>
	</tbody>
	</table>
<?PHP
}
else
{
?>
	<div class="main">
		
            <ul class="linkmenu" id="linkmenu">
                <li><a href="linkc.php" target="iframeview">主页</a></li>
                <li><a href="linkc.php?action=1" target="iframeview">添加短网址</a></li>
                <li><a href="linkc.php?action=3" target="iframeview">短网址管理</a></li>
                <li><a href="linkc.php" target="iframeview">垃圾回收站</a></li>
            </ul>
			<script>
            (function(S){
                var D = S.DOM, E = S.Event, index = -1, as = [];
            
                S.all("#linkmenu a").on("mouseover", function(){
                    var _this = this;
                    index = S.indexOf(_this, S.all("#linkmenu a"));
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
			<div class="shortlink-inner"><iframe src="" frameborder="0" name="iframeview"></iframe></div>
	</div>
<?PHP
}
include ($Dongtai_File."footer.php");
?>
</body>
</html>