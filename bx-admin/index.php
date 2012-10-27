<?PHP
if(session_start()&&$_SESSION['admin']==1)
{
	echo '<script language="javascript">window.location.href="admin.php"</script>';
}
else
{	
	echo '<script language="javascript">window.location.href="/login.php"</script>';
}
?>