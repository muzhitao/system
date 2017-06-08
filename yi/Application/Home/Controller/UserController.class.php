<?php
/**
 * Created by PhpStorm.
 * User: zhitao.mu
 * Date: 2017/3/8
 * Time: 17:46
 */

namespace Home\Controller;
use Think\Controller;

class UserController extends BaseController {
	public function login(){

		if (IS_POST) {
			$username = I('post.username');
			$password = md5(I("post.password"));
			$code = strtoupper($_POST['verify']);

			if (!$this->check_verify($code)) {
				$this->error('验证码不正确');
			}

			if(strpos($username,'@')==false){
				$logintype='mobile';
				if(!_checkmobile($username)){
					$this->error("手机格式不正确!");
				}	
			} else {
				$logintype='email';
				if(!_checkemail($username)){
					$this->error("邮箱格式不正确!");
				}
			}

			$model = D("User");
			$member = $model->getOneByField($logintype, $username);
			if(!$member){
				$this->error("帐号不存在错误!");
			}

			if ($member['password'] != $password) {
				$this->error("帐号或密码错误!");
			}

			$time = time();
			$ip = get_client_ip();
			$save['user_ip'] = get_client_ip();
			$save['login_time'] = time();
			$model->where('uid = '.$member['uid'])->save($save);
			cookie('uid', $member['uid'], 60*60*24*7);
			cookie('username', $member['username'], 60*60*24*7);
			$this->success('登录成功',U("Index/index"));exit;
		}
		
	
		$this->display();
	}

	public function register() {
		$this->display();
	}

	public function findpassword(){
		$this->display();
	}
}