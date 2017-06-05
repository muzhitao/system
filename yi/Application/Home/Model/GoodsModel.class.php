<?php
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model {

	protected $tableName = 'Shoplist';
    protected $member_go_record_model = 'Member_go_record';

    /**
     * 获取推荐商品
     * @param int $limit
     * @return mixed
     */
	public function getRecommGoods($limit = 10)
	{
		$model = D($this->tableName);

		$where['pos'] = 1;
		$where['q_uid'] = array('exp',' is NULL');
		$list = $model->where($where)->order('id DESC')->limit($limit)->select();

		return $list;
	}

    /**
     * 获取人气商品
     * @param int $limit
     * @return mixed
     */
	public function getRenqiGoods($limit = 10)
	{
		$model = D($this->tableName);

		$where['renqi'] = 1;
		$where['q_uid'] = array('exp',' is null');
		$list = $model->where($where)->order('id DESC')->limit($limit)->select();

		return $list;
	}

    /**
     * 获取最先揭晓
     * @param int $limit
     * @return mixed
     */
	public function getNewGxb($limit = 10)
	{
		$model = D($this->tableName);
		$field = 'qishu,id,sid,thumb,title,q_uid,q_user,q_user_code,zongrenshu';
		$where['q_end_time'] = array('exp',' is not null');
		$where['q_showtime'] = 'N';

		$list = $model->field($field)->where($where)->order('q_end_time DESC')->limit(limit)->select();

		return $list;
	}

    /**
     * 获取即将揭晓
     * @param int $limit
     * @return mixed
     */
	public function getStartGxb($limit = 10)
	{
		$model = D($this->tableName);

		$where['q_uid'] = array('exp',' is not null');

		$list = $model->where($where)->order('shenyurenshu ASC')->limit($limit)->select();

		return $list;
	}

    public function getQishuPub() {

        $model = D($this->tableName);
        $where['q_end_time'] = array('exp',' is not null');
        $where['q_showtime'] = 'N';
        $list = $model->where($where)->order('q_end_time DESC')->select();
        if ($list) {
            foreach($list as &$val) {
                $val['q_user'] = unserialize($val['q_user']);
                $val['q_user'] = unserialize($val['q_user']);
                $cond['uid'] = $val['q_uid'];
                $cond['shopid'] = $val['id'];
                $cond['shopqishu'] = $val['qishu'];
                $user_shop_number = D($this->member_go_record_model)->where($cond)->sum('gonumber');
                $val['gonumber'] = $user_shop_number['gonumber'];
            }
        }

        return $list;
    }
}