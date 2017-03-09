<?php
/**
 * Created by PhpStorm.
 * User: 55HaiTao
 * Date: 2016/9/30
 * Time: 11:21
 */

namespace Admin\Controller;
use Think\Controller;

class AdminController extends BaseController {

    public function lists() {


	    $Admin = D("Admin");
	    $count = $Admin->count();
	    $Page       = new \Think\PageAdmin($count,1);
	    $Page->setConfig('next','下一页');
	    $Page->setConfig('prev','上一页');
	    $show       = $Page->show();// 分页显示输出
	    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	    $list = $Admin->order('addtime DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出
	    $this->display();
    }

	public function add() {

		if (IS_POST) {
			$add_data = array(
				'username' => I("post.username"),
				'userpass' => md5(I('post.password')),
				'useremail' => I("email"),
				'addtime' => time(),
			);

			$Admin = D("Admin");
			$result = $Admin->add($add_data);
			if ($result) {
				$this->success('添加成功',U("Admin/lists"));
			} else {
				$this->error('添加失败');
			}
		}

		$this->display();
	}

	public function checkform() {
		if (IS_POST) {
			$username = trim(I("post.username"));
			if (strlen($username) < 0  && strlen($username) > 20) {
				$this->ajax_return(0,'用户名在0-20字符之间');
			}

			$Admin = D("Admin");
			$where['username'] = $username;
			$result = $Admin->where($where)->find();
			if ($result) {
				$this->ajax_return(0,'用户名已经存在');
			}

			$this->ajax_return(1,'验证成功');

		}
	}
}
