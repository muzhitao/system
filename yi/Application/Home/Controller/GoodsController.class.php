<?php
/**
 * Created by PhpStorm.
 * User: zhitao.mu
 * Date: 2017/3/8
 * Time: 17:43
 */

namespace Home\Controller;
use Think\Controller;

class GoodsController extends BaseController {

    public function detail() {


    	$id = I("get.id");

    	$detail = D("Goods")->getGoodsDetail($id);
    	if (empty($detail)) {
    		$this->error('商品信息不存在');
    	}

    	$q_showtime = (isset($detail['q_showtime']) && $detail['q_showtime'] == 'N') ? 'N' : 'Y';
    	if($item['q_end_time'] && $q_showtime == 'N'){
			echo 111;
			exit;			
		}


    	$this->assign('detail', $detail);
        $this->display();
    }

  
}