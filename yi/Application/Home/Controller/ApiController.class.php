<?php
/**
 * Created by PhpStorm.
 * User: zhitao.mu
 * Date: 2017/3/8
 * Time: 17:45
 */
namespace Home\Controller;
use Think\Controller;
class ApiController extends BaseController {

    public function fund() {
       $model = D("Fund");
       $fund = $model->find(1);
       if ($fund && $fund['fund_off'] == 1) {
           echo $fund['fund_count_money'];
       } else {
           echo 0.00;
       }
    }
}