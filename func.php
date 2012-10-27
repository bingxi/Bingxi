<?PHP
function bxmd5($string)
{
	$pwstring=$string;
	$pwstring=md5("AA".$pwstring."ZZ");
	$pwstring=md5('BX'.$pwstring."XB");
	$pwstring=base64_encode($pwstring);
	return $pwstring;
}

function user_reg($userming,$user_pw,$user_pw2,$mail,$autologin)//用户注册函数
{
	if (!ereg('^[0-9a-zA-Z\_]*$',$user_pw))
	    {return "用户名只能是英文字母或数字。";}
	elseif (!eregi("^[a-z'0-9]+([._-][a-z'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$",$mail))
		{return "邮箱格式不正确。";}
	elseif ($user_pw<>$user_pw2)
		{return "两次输入的密码不相同，请确认！";}
	elseif (strlen($userming)<3||strlen($userming)>20)
		{return "用户名必须在3-20个字符之间。";}
	elseif (strlen($user_pw)<6||strlen($user_pw)>15)
		{return "密码必须在6-15个字符之间";}
	else
		{
			$connect=mysql_connect(DB_SERVE,DB_USER,DB_PW) or die("连接数据库失败");//连接数据库
			mysql_query("set names 'utf8'",$connect);
			mysql_select_db(DB,$connect) or die("选取数据库失败");//选择数据表
			$sqlcommand = "SELECT `id` FROM ".DB.".".DB_USERDB." WHERE user='".$userming."'";//选取user项等于用户请求注册用户名
			//echo $sqlcommand;
			$sql_reg_back =  mysql_query($sqlcommand, $connect);//存储返回结果
			mysql_close($connect);
			$pwec=bxmd5($user_pw);
			if (mysql_num_rows($sql_reg_back)==0)
			{
				$sqlcommand="INSERT INTO ".DB.".".DB_USERDB." (id,user,pw,mail) VALUES ('NULL','$userming','$pwec','$mail')";
				//echo $sqlcommand;
				$sql_reg_back=mysql_query($sqlcommand,$connect) or die('系统错误！');
				//echo mysql_error();
				if ($autologin==1)
				{session_start();$_SESSION['user']=$userming;}
				return "用户名：".$userming."注册成功";
			}
			else
				{return "注册失败：用户名".$userming."已被注册。";}
		}
//使用方法：user_reg('lwj','a00000','a00000');
}

function user_login($userming,$pw)
{
	$connect=mysql_connect(DB_SERVE,DB_USER,DB_PW) or die("连接数据库失败");
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db(DB,$connect) or die("选取数据库失败");//选择数据表
	$sqlcommand = "SELECT `pw`,`user`,`admin`,`jf` FROM ".DB.".".DB_USERDB." WHERE user='".$userming."'";
	//echo $sql;
	$sql_back= mysql_query($sqlcommand, $connect);
	mysql_close($connect);
	$sql_login_back= mysql_fetch_array($sql_back);
	//print_r ($sql_login_back);
	$loginback=array("pw"=>$sql_login_back['pw'],"user"=>$sql_login_back['user'],"admin"=>$sql_login_back['admin']);
	if (bxmd5($pw)==$loginback['pw'])
	{
		return 
		array(
		"user"=>$loginback['user'],
		"admin"=>$loginback['admin'],
		"status"=>true);
	}
	else
	{return array(status=>false);}
}
?>
