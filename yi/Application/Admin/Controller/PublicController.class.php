<?php
namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller {
    public function index() {

    }

    public function login() {
        $this->display();
    }

    /**
     * 验证码
     */
    public function verify() {
        $Verify = new \Think\Verify();
        $Verify->imageW = 80;
        $Verify->imageH = 27;
        $Verify->fontSize = 12;
        $Verify->length = 4;
        $Verify->useCurve = false;
        $Verify->entry();
    }

    public function checklogin() {


        if (IS_POST) {

            $username = I("post.username");
            $password = I("post.password");
            $code = I("post.code");

            $verify = new \Think\Verify();
            if (!$verify->check($code)) {
                $data['status'] = 0;
                $data['content'] = '验证码不正确';
                $this->ajaxReturn($data);
            }

            $Admin = D("Admin");
            $map['username'] = $username;
            $detail = $Admin->where($map)->find();

            if (empty($detail)) {
                $data['status'] = 0;
                $data['content'] = '帐号不存在';
                $this->ajaxReturn($data);
            }

            if ($detail['userpass'] != md5($password)) {
                $data['status'] = 0;
                $data['content'] = '帐号或密码错误';
                $this->ajaxReturn($data);
            }

            session('wadmin',$detail);
            session('admin_id', $detail['uid']);
            session('username', $detail['username']);
            session('logintime', date('Y-m-d H:i:s',$detail['logintime']));
            session('loginip', $detail['loginip']);

            $save_data = array(
                'logintime' => time(),
                'loginip' => get_client_ip()
            );

            $Admin->where('uid='.$detail['uid'])->save($save_data);
            $data['status'] = 1;
            $data['url'] = U('Index/index');
            $data['content'] = '登录成功';
            $this->ajaxReturn($data);

        }
    }

    public function lougout() {
        session(null);
        $this->success ( '已注销登录！', U ( "Public/login" ) );
    }
}