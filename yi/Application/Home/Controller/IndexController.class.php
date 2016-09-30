<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function index() {

        $this->assign('cate_list', getCate());

        $slide = D("Slide");
        $slide_list = $slide->select();

        $this->assign('slide_list', $slide_list);
        $this->display();
    }
}