<?php
/**
 * Created by PhpStorm.
 * Date: 2016/9/29
 * Time: 18:04
 */

namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller {

    public function _initialize() {
        if (! $_SESSION ["wadmin"]) {
            $this->redirect ( "Admin/Public/login" );
        }
    }

	public function ajax_return($status = 0, $msg = 'ok', $data = array()) {

		$return['status'] = $status;
		$return['msg'] = $msg;
		$return['data'] = $data;
		$this->ajaxReturn($return);
	}
}