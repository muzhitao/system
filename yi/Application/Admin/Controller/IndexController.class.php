<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends BaseController {
    public function index() {
        $this->display();
    }

    public function Tdefault() {

        $SysInfo = array(
            'os' => PHP_OS,
            'phpv' => PHP_VERSION,
            'web_server' => $_SERVER ['SERVER_SOFTWARE'],
            'MysqlVersion' => mysql_get_server_info(),
            'post_max_size' => get_cfg_var ("upload_max_filesize"),
            'max_execution_time' => get_cfg_var("max_execution_time"),
            'zend_version' => zend_version(),
            'timezone' => date_default_timezone_get(),
        );

        $this->assign("SysInfo", $SysInfo);
        $this->display();
    }
}