<?php
namespace Home\Model;
use Think\Model;

class CategoryModel extends Model {
    protected $tableName = 'Category';

    public function getIndexCat() {

        $model = D($this->tableName);

        $where['model'] = 1;
        $where['parentid'] = 0;
        $list = $model->where($where)->order('`order` DESC')->select();
        return $list;
    }
}