<?php
/**
 * Created by PhpStorm.
 * User: 55HaiTao
 * Date: 2016/9/30
 * Time: 11:18
 */

namespace Admin\Controller;
use Think\Controller;

class SystemController extends BaseController {
    public function webcfg() {

	    $config = D("config");
	    if (IS_POST) {
		    $data = $_POST;
		    $result = $config->updateConfig($data);
		    if ($result) {
			    $this->success('编辑成功');
		    } else {
			    $this->error('编辑失败');
		    }
	    } else {

		    $web = $config->getConfig();
		    $this->assign('web',$web);
		    $this->display();
	    }
    }

	public function base() {

		$config = D("config");
		if (IS_POST) {
			$data = $_POST;
			$result = $config->updateConfig($data);
			if ($result) {
				$this->success('编辑成功');
			} else {
				$this->error('编辑失败');
			}
		} else {

			$web = $config->getConfig();
			$this->assign('web',$web);
			$this->display();
		}

	}
}
