<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $tableName = 'Member';

	public function getOneByField($field = '', $value = '') {

		$model = D($this->tableName);
		$where[$field] = $value;
		$result = $model->where($where)->find();
		return $result;
	}
}