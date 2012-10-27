<?PHP
header("Content-type: text/html;charset=utf-8");
require_once '../bx-config.php';
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
	<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
	<title>520</title>
	<link rel="stylesheet" href="/bx-file/css/admin.css" />
</head>
<body>
<?PHP
ob_start();
if ($_GET['action']=='1'||$_GET['action']=="")
{
?>
<table class="adminbg">
	<tr><th colspan="4">服务器参数</th></tr>
	<tr>
		<td>冰曦系统版本</td>
		<td colspan="3"><?php echo $version;?></td>
	</tr>
	<tr>
		<td>服务器域名/IP地址</td>
		<td colspan="3"><?php echo @get_current_user();?> - <?php echo $_SERVER['SERVER_NAME'];?>(<?php if('/'==DIRECTORY_SEPARATOR){echo $_SERVER['SERVER_ADDR'];}else{echo @gethostbyname($_SERVER['SERVER_NAME']);} ?>)&nbsp;&nbsp;你的IP地址是：<?php echo @$_SERVER['REMOTE_ADDR'];?></td>
	</tr>
	<tr>
		<td>服务器标识</td>
		<td colspan="3"><?php if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo @php_uname();};?></td>
	</tr>
	<tr>
		<td>服务器操作系统</td>
		<td colspan="3"><?php $os = explode(" ", php_uname()); echo $os[0];?> &nbsp;内核版本：<?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?></td>
	</tr>
	<tr>
		<td>服务器解译引擎</td>
		<td colspan="3"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
	</tr>
	<tr>
		<td>服务器语言</td>
		<td colspan="3"><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>
	</tr>
	<tr>
		<td>服务器端口</td>
		<td colspan="3"><?php echo $_SERVER['SERVER_PORT'];?></td>
	</tr>
	<tr>
		<td>服务器主机名</td>
		<td colspan="3"><?php if('/'==DIRECTORY_SEPARATOR ){echo $os[1];}else{echo $os[2];} ?></td>
	</tr>
	<tr>
		<td>绝对路径</td>
		<td colspan="3"><?php echo $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));?></td>
	</tr>
	<tr>
		<td>管理员邮箱</td>
		<td colspan="3"><?php echo $_SERVER['SERVER_ADMIN'];?></td>
	</tr>
	<tr>
		<td>文件路径</td>
		<td colspan="3"><?php echo str_replace('\\','/',__FILE__)?str_replace('\\','/',__FILE__):$_SERVER['SCRIPT_FILENAME'];?></td>
	</tr>	
</table>
<?PHP
exit();
}
elseif ($_GET['action']=='2')
{
?>
<table class="adminbg">
	<tr><th colspan="4" style="text-align:center;">用户列表</th></tr>
	<tr class="user">
		<th width="16%">id</th>
		<th width="20%">用户名</th>
		<th width="25%">积分</th>
		<th>操作</th>
	</tr>
<?PHP
	if ($_GET['usernum']=="")
	{
		$usernum=0;
		$usernum2=$usernum+1;
	}
	else
	{
		$usernum=(int)$_GET['usernum'];
		$usernum2=$usernum+1;
	}
	$connect=mysql_connect(DB_SERVE.":".DB_PORT,DB_USER,DB_PW) or die("连接数据库失败");//连接数据库
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db(DB,$connect) or die("选取数据库失败");//选择数据表
	$sqlcommand = "SELECT `id`,`user`,`jf` FROM ".DB.".".DB_USERDB." LIMIT ".$usernum*30 .",".$usernum2*30;//选取user项等于用户请求
	//echo $sql;
	$user_select_back =  mysql_query($sqlcommand, $connect);//存储返回结果
	mysql_close($connect);
	while($userback = mysql_fetch_array($user_select_back))
	{
	echo "<tr>";
	echo "<td>" . $userback['id'] . "</td>";
	echo "<td>" . $userback['user'] . "</td>";
	echo "<td>" . $userback['jf'] . "</td>";
	echo "</tr>";
	}
?>  
</table>
<?PHP
exit();
}
?>
</body>
</html>