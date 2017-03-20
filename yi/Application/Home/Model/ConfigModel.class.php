<?php
/**
 * Created by PhpStorm.
 * User: Muzhitao
 * Date: 2017/3/9 0009
 * Time: 21:07
 * Email：muzhitao@vchangyi.com
 */
namespace Home\Model;
use Think\Model;

class ConfigModel extends Model {
	protected $table = 'Config';

	public function getConfig() {
            $config = new \Admin\Model\ConfigModel();
            $data = $config->getConfig();
            return $data;
	}
}