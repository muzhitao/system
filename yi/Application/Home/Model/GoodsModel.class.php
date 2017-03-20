<?php
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model {

	protected $tableName = 'Shoplist';

	public function getRecommGoods($limit = 10)
	{
		$model = D($this->tableName);

		$where['pos'] = 1;
		$where['q_uid'] = array('exp',' is NULL');
		$list = $model->where($where)->order('id DESC')->limit($limit)->select();

		return $list;
	}

	public function getRenqiGoods($limit = 10)
	{
		$model = D($this->tableName);

		$where['renqi'] = 1;
		$where['q_uid'] = array('exp',' is null');
		$list = $model->where($where)->order('id DESC')->limit($limit)->select();

		return $list;
	}

	public function getNewGxb($limit = 10)
	{
		$model = D($this->tableName);
		$field = 'qishu,id,sid,thumb,title,q_uid,q_user,q_user_code,zongrenshu';
		$where['q_end_time'] = array('exp',' is not null');
		$where['q_showtime'] = 'N';

		$list = $model->field($field)->where($where)->order('q_end_time DESC')->limit(limit)->select();

		return $list;
	}

	public function getStartGxb($limit = 10)
	{
		$model = D($this->tableName);

		$where['q_uid'] = array('exp',' is not null');

		$list = $model->where($where)->order('shenyurenshu ASC')->limit($limit)->select();

		return $list;
	}
}