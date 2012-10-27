<?PHP
define ('ADMIN','冰曦');//管理员用户名
define ('ADMIN_PW','bingxi2012');//管理员密码
define ('DB_SERVE',getenv('HTTP_BAE_ENV_ADDR_SQL_IP').":".getenv('HTTP_BAE_ENV_ADDR_SQL_PORT'));//数据库服务器.":".端口号
define ('DB_USER',getenv('HTTP_BAE_ENV_AK'));//数据库用户名
define ('DB_PW',getenv('HTTP_BAE_ENV_SK'));//数据库密码
define ('DB','OTrpPOkUORYFCfzPnQoh');//数据库
define ('DB_USERDB','user');//用户数据表
$version = "Bingxi V1.0.2.3 BAE OnLine Mode";//版本信息
define ('theme','./bx-theme/bx/');//主题目录

?>