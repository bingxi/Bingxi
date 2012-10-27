<?PHP
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    $errfile=str_replace(getcwd(),"",$errfile);
    $errstr=str_replace(getcwd(),"",$errstr);
    switch ($errno) {
        case 1:
            $user_defined_errType = '致命的运行时错误(E_ERROR)';
            break;
        case 2:
            $user_defined_errType = '非致命的运行时错误(E_WARNING)';
             break;
        case 4:
            $user_defined_errType = '编译时语法解析错误(E_PARSE)';
			break;
		case 8:
			$user_defined_errType = '运行时提示(E_NOTICE)';
			break;
		case 16:
			$user_defined_errType = 'PHP内部错误(E_CORE_ERROR)';
			break;
		case 32:
			$user_defined_errType = 'PHP内部警告(E_CORE_WARNING)';
			break;
		case 64:
			$user_defined_errType = 'Zend脚本引擎内部错误(E_COMPILE_ERROR)';
			break;
		case 128:
			$user_defined_errType = 'Zend脚本引擎内部警告(E_COMPILE_WARNING)';
			break;
		case 256:
			$user_defined_errType = '用户自定义错误(E_USER_ERROR)';
			break;
		case 512:
			$user_defined_errType = '用户自定义警告(E_USER_WARNING)';
			break;
		case 1024:
			$user_defined_errType = '用户自定义提示(E_USER_NOTICE)';
			break;
		case 2048:
			$user_defined_errType = '代码提示(E_STRICT)';
			break;
		case 4096:
			$user_defined_errType = '可以捕获的致命错误(E_RECOVERABLE_ERROR)';
			break;
		case 8191:
			$user_defined_errType = '所有错误警告(E_ALL)';
			break;
		default:
			$user_defined_errType = '未知类型';
            break;
    }
	echo "<div class=\"warning\">$user_defined_errType 在 $errfile 的第$errline 行，内容：$errstr</div>";
	file_put_contents("./".date('Y-m-d').'_errlog.txt',date('Y-m-d H:i:s')." $errfile $errline   $user_defined_errType $errstr "."\r\n",FILE_APPEND);
    return true;
}
set_error_handler(myErrorHandler);
?>