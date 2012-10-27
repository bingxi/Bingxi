<?PHP
/*
BingXi 测试文件
V1.0.1.2
*/
$test_version="V1.0.1.2";
$logger=BaeLog::getInstance();
//打印一条调试日志
//$logger ->logDebug($test_version."测试信息。。");

$tq2 = new BaeTaskQueue('bingxi');
 $task = array(
   BaeTaskQueue::OFFLINEDOWNLOAD_SOURCE_URL => 'http://bingxi.tk/bx-file/css/style.css',
   BaeTaskQueue::OFFLINEDOWNLOAD_DEST_URL => './1.css',
 );
 echo $tq2->push($task);
 ?>

echo '执行完毕@';
echo '<p>BingXi test file '.$test_version."</p>";
?>