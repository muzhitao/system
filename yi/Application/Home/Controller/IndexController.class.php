<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {


    public function index() {

    	$this->seo['title'] = '网站首页';
    	$this->seo['keywords'] = '关键字';
    	$this->seo['description'] = '描述';
    	$Goods = D("Goods");
    	$recommend = $Goods->getRecommGoods(3);
    	$recommend_one = $Goods->getRecommGoods(1);
    	$this->assign('recommend', $recommend);
    	$this->assign('recommend_one', $recommend_one[0]);
    	$renqi =$Goods->getRenqiGoods(8);
    	$this->assign('renqi', $renqi);

    	$startGxb = $Goods->getStartGxb(8);
    	$this->assign('startGxb', $startGxb);
        $slide = D("Slide");
        $slide_list = $slide->select();

        $shopqishub = $Goods->getQishuPub();
        $this->assign('shopqishub', $shopqishub);
        $this->assign('slide_list', $slide_list);
        $this->assign('seo', $this->seo);
        $this->display();
    }
}