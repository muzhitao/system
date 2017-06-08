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

    	$model = D("Goods");
    	$detail = $model->getGoodsDetail($id);
    	//print_r($detail);exit;
    	if (empty($detail)) {
    		$this->error('商品信息不存在');
    	}

    	$q_showtime = (isset($detail['q_showtime']) && $detail['q_showtime'] == 'N') ? 'N' : 'Y';
    	if($item['q_end_time'] && $q_showtime == 'N'){
			echo 111;
			exit;			
		}

		$us_record = $model->getRecordList(array('id'=>$detail['id'],'qishu'=>$detail['qishu']));
        $brand = D("Brand")->where('id='.$detail['brandid'])->find();
        $category = D("Category")->where('cateid='.$detail['cateid'])->find();

        $itemlist = $model->getShopList($detail['sid']);

        $loopqishu='<ul class="Period_list">';
        if(!$itemlist[0]['q_uid']){
            if($itemlist[0]['id'] == $detail['id'])
                $loopqishu.='<li><a href="'.WEB_PATH.'/goods/'.$itemlist[0]['id'].'"><b class="period_Ongoing period_ArrowCur" style="padding-left:0px;">'."第".$itemlist[0]['qishu']."期<i></i></b></a></li>";
            else
                $loopqishu.='<li><a href="'.WEB_PATH.'/goods/'.$itemlist[0]['id'].'"><b class="period_Ongoing">'."第".$itemlist[0]['qishu']."期<i></i></b></a></li>";
        }else{      
            if($itemlist[0]['id'] == $item['id'])
                $loopqishu.='<li><a href="'.WEB_PATH.'/goods/'.$itemlist[0]['id'].'"><b class="period_ArrowCur">'."第".$itemlist[0]['qishu']."期<i></i></b></a></li>";
            else
                $loopqishu.='<li><a href="'.WEB_PATH.'/dataserver/'.$itemlist[0]['id'].'" class="gray02">第'.$itemlist[0]['qishu'].'期</a></li>';
        }
        unset($itemlist[0]);            
        foreach($itemlist as $key=>$qitem){
            if($key%9==0){
                $loopqishu.='</ul><ul class="Period_list">';
            }
            if($qitem['id'] == $detail['id'])
                $loopqishu.='<li><b class="period_ArrowCur">第'.$qitem['qishu'].'期</b></li>';
            else
                $loopqishu.='<li><a href="'.WEB_PATH.'/dataserver/'.$qitem['id'].'" class="gray02">第'.$qitem['qishu'].'期</a></li>'; 
        }
        $loopqishu.='</ul>';

        $sid_code = $model->getShopList($detail['sid'],'id DESC', '1,1', '*');
        if ($sid_code) {
            $sid_data = $sid_code[0];
        }

        $sid_go_record = $model->getRecordOne(array('shopid'=>$sid_data['id'],'uid'=>$sid_data['q_uid']));

        $this->assign('sid_go_record', $sid_go_record);
        $this->assign('sid_code', $sid_data);
        $this->assign('loopqishu', $loopqishu);
        $this->assign('brand', $brand);
        $this->assign('category', $category);
		$this->assign('us_record', $us_record);
    	$this->assign('detail', $detail);
        $this->display();
    }

    public function goodslist() {

        $cid - I("get.cateid");
        $this->display('list');
    }
  
}