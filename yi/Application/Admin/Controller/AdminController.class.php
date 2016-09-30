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

    public function index() {

    }

    public function updateinfo() {

        echo I("get.uid");
    }
}
