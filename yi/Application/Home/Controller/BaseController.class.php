<?php
/**
 * Created by PhpStorm.
 * Date: 2016/9/29
 * Time: 18:04
 */

namespace Home\Controller;
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

    protected function _getCat() {

        $cate = D("Category");
        $list = $cate->getIndexCat();
        return $list;

    }
}