<script type="text/javascript">
    function runtime()
    {
        BirthDay=new Date("AUGUST, 24,2012");//这里改成你的网站建站时间！
        today=new Date();
        timeold=(today.getTime()-BirthDay.getTime());
        sectimeold=timeold/1000
        secondsold=Math.floor(sectimeold);
        msPerDay=24*60*60*1000
        e_daysold=timeold/msPerDay
        daysold=Math.floor(e_daysold);
        document.write("本网站已运行"+daysold+"天");
    }
</script>
<!--header start-->
<header>
    <nav class="header">
        <div class="logo">
            <a href="/"><img src="/bx-file/img/bingxi.png" alt="冰曦" width="100" height="30"></a><!--Logo-->
        </div>
        <ul>
            <li><a href="/">首页</a></li>
            <li><a href="http://blog.bingxi.tk/">博客</a></li>
        </ul>
        <ul class="right">
		<?PHP
		if ($_SESSION['user']=="")
		{
			echo '<li><a href="/login.php">登录</a></li>';
		}
		else
		{
			echo '<li><a href="/user.php">'.$_SESSION['user'].'</a></li>';
		}
		?>
            <li><a><script language="javascript">runtime();</script></a><!--js-函数-站点运行时间--></li>
        </ul>
    </nav>
</header>
<!--header end-->