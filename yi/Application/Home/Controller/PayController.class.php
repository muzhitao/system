<?php
/**
 * Created by PhpStorm.
 * User: zhitao.mu
 * Date: 2017/3/8
 * Time: 17:47
 */

namespace Home\Controller;
use Think\Controller;

class PayController extends BaseController {
	
	public function _initialize() {
		vendor('Alipay.Corefunction');
        vendor('Alipay.Md5function');
        vendor('Alipay.Notify');
        vendor('Alipay.Submit');    
	}
	
	public function doalipay() {
		
	}
	
	public function notifyurl() {
		
	}
	
	public function returnurl() {
		
	}

}