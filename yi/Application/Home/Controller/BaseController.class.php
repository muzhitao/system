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

        $this->assign('index', CONTROLLER_NAME);
        $this->assign('nowtime', time());
        $this->assign('cat_list', $this->_getCat());
    	$this->assign('seo', $this->seo);
    }

    protected function _getCat() {

        $cate = D("Category");
        $list = $cate->getIndexCat();
        return $list;
    }

    public function verify() {
        $config =    array(
            'fontSize'    =>    12,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function check_verify($code, $id = '') {
         $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}