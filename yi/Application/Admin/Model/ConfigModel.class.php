<?php
/**
 * Created by PhpStorm.
 * User: Muzhitao
 * Date: 2017/3/9 0009
 * Time: 21:07
 * Email：muzhitao@vchangyi.com
 */
namespace Admin\Model;
use Think\Model;

class ConfigModel extends Model {
	protected $table = 'Config';

	public function getConfig() {
		$model = D($this->table);
		$select = $model->select();
		$data = array();
		if ($select) {
			foreach($select as $v) {
				$data[$v['name']] = $v['value'];
			}
		}

		return $data;
	}

	public function updateConfig($data) {
		if (empty($data)) {
			return false;
		}
		$model = D($this->table);
		foreach($data as $key => $v) {
			$save_data = array(
				'value' => $v
			);
			$model->where('name = "'.$key.'"')->save($save_data);
		}

		return true;
	}
}