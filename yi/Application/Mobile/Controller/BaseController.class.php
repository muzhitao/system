<?php
namespace Mobile\Controller;
use Think\Controller;
class BaseController extends Controller {
 
    public $seo = array();
    public function _initialize() {
        $config_model = D("config");
        $config = $config_model->getConfig();
        $this->assign('config', $config);
        $this->assign('nowtime', time());
        $this->assign('cat_list', $this->_getCat());
    	$this->assign('seo', $this->seo);
    }
}