<?PHP
session_start();
if (!isset($_SESSION['user'])){exit('<script language="javascript">window.location.href="/login.php"</script>');}
require ("./bx-config.php");

?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title></title>
	<?PHP echo $Page_Head_Infor;?>
</head>
<body>
	<?PHP
	if (isset($_GET['action'])&&$_GET['action']==1)
	{
	
	}
	elseif (isset($_GET['action'])&&$_GET['action']==3)
	{
	$connect=mysql_connect(DB_SERVE,DB_USER,DB_PW) or die("连接数据库失败");
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db(DB,$connect) or die("选取数据库失败");//选择数据表
	$sqlcommand = "SELECT `urlid`,`truelink`,`times` FROM ".DB.".".DB_LINKDB." WHERE user='".$_SESSION['user']."'";
	//echo $sqlcommand;
	$sql_back= mysql_query($sqlcommand, $connect);
	//echo $sql_back;
	echo "<table class=\"linkback\">";
	echo "<tr style=\"background-color:#EEE;\">
		<td>短网址</td>
		<td>真实网址</td>
		<td>访问量</td>
	</tr>";
	while($linkback = mysql_fetch_array($sql_back))
	{
	echo "<tr>";
	echo "<td>" ."<a href=\"/".$linkback['urlid']."\" target=\"_blank\">"."http://bingxi.tk/".$linkback['urlid']. "</td>";
	echo "<td>" . $linkback['truelink'] . "</td>";
	echo "<td>" . $linkback['times'] . "</td>";
	echo "</tr>";
	}
	echo '</table>';
	}
	?>
</body>
</html>